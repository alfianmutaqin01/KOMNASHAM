<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;

    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public $showUserForm = false;
    public $isEditMode = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', ($this->isEditMode ? 'unique:users,email,' . $this->userId : 'unique:users,email')],
            'password' => ($this->isEditMode && empty($this->password) ? 'nullable' : 'required') . '|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function createUser()
    {
        $this->resetForm();
        $this->isEditMode = false;
        $this->showUserForm = true;
    }

    public function editUser(User $user)
    {
        $this->isEditMode = true;
        $this->showUserForm = true;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles->pluck('name')->first(); // FIXED

        $this->password = '';
        $this->password_confirmation = '';
    }

    public function saveUser()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        if ($this->isEditMode) {
            $user = User::findOrFail($this->userId);
            $user->update($data);
            session()->flash('success', 'Pengguna berhasil diperbarui!');
        } else {
            $user = User::create($data + ['password' => bcrypt($this->password)]);
            session()->flash('success', 'Pengguna baru berhasil ditambahkan!');
        }

        if (!empty($this->role)) {
            $user->syncRoles([$this->role]);
        }

        $this->showUserForm = false;
        $this->resetForm();
    }

    public function deleteUser(User $user)
    {
        if (Auth::id() === $user->id) {
            session()->flash('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
            return;
        }

        $user->delete();
        session()->flash('success', 'Pengguna berhasil dihapus!');
    }

    public function resetForm()
    {
        $this->resetValidation();
        $this->reset([
            'userId',
            'name',
            'email',
            'password',
            'password_confirmation',
            'role',
            'showUserForm',
            'isEditMode',
        ]);
    }

    public function render()
    {
        $users = User::with('roles')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        $roles = Role::all();

        return view('livewire.user-table', compact('users', 'roles'));
    }
}
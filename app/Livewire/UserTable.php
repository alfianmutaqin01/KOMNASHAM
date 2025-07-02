<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTable extends Component
{
    use WithPagination;

    public $search = ''; 
    public $perPage = 10; // Jumlah item per halaman
    public $sortField = 'name'; 
    public $sortAsc = true; 

    // Properti untuk form tambah/edit (akan diisi saat mode edit)
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation; 
    public $role; 

    public $showUserForm = false; 
    public $isEditMode = false; 

    // Aturan validasi
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', ($this->isEditMode ? 'unique:users,email,' . $this->userId : 'unique:users,email')], // Email unik kecuali saat edit diri sendiri
            'password' => ($this->isEditMode && empty($this->password) ? 'nullable' : 'required') . '|min:8|confirmed', // Password opsional saat edit jika tidak diubah
            'role' => 'required|string|exists:roles,name', // Pastikan peran ada di tabel roles
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
        $this->resetForm(); // Bersihkan form
        $this->isEditMode = false;
        $this->showUserForm = true;
    }

    // Metode untuk menampilkan form edit pengguna
    public function editUser(User $user) 
    {
        $this->isEditMode = true;
        $this->showUserForm = true;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role; 

        $this->password = '';
        $this->password_confirmation = '';
    }

    // Metode untuk menyimpan atau memperbarui pengguna
    public function saveUser()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        if ($this->isEditMode) {
            $user = User::find($this->userId);
            $user->update($data);
            session()->flash('success', 'Pengguna berhasil diperbarui!');
        } else {
            $user = User::create($data);
            session()->flash('success', 'Pengguna baru berhasil ditambahkan!');
        }

        // Sync role jika menggunakan Spatie Permission
        if (isset($this->role) && !empty($this->role)) {
             $user->syncRoles([$this->role]);
        }


        $this->showUserForm = false; 
        $this->resetForm();
    }

    // Metode untuk menghapus pengguna
    public function deleteUser(User $user)
    {
        
        if (Auth::id() === $user->id) {
             session()->flash('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
             return;
        }

        $user->delete();
        session()->flash('success', 'Pengguna berhasil dihapus!');
    }

    // Metode untuk mereset properti form
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
            'isEditMode'
        ]);
    }

    // Metode render komponen
    public function render()
    {
        $users = User::search($this->search) 
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

        $roles = Role::all(); 

        return view('livewire.user-table', compact('users', 'roles'));
    }
}
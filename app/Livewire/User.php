<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $id, $name, $email, $isEditUser = false;
    public $isUpdatePage = false;
    public $page = 1;
    public $perPage = 10;
    public $search = '';
    public $sortDirection = 'DESC';
    public $sortColumn = 'created_at';
    public $confirmDeleteId;
    public $count = 0;
    

    // public function increment()
    // {

    //     $this->editUser = true;

    // }

    /**
     * Toggle sort direction when column header is clicked.
     *
     * @param string $column
     * @return void
     */
    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection === 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    /**
     * Store the current page when updating.
     *
     * @param int $page
     * @return void
     */
    public function updatingPage($page)
    {
        $this->page = $page ?: 1;
        
    }

    /**
     * Save the current page to the session.
     *
     * @return void
     */
    public function updatedPage()
    {
        session(['page' => $this->page]);
    }

    /**
     * Initialize component with stored page or default values.
     *
     * @return void
     */
   
    public function mount()
    {
        if (session()->has('page')) {
            $this->page = session('page');
        }
    }

        /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->name = '';
        $this->email = '';
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function editUser($id)
    {
        $user = ModelsUser::findOrFail($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditUser = true;
    }

    public function render()
    {
        $columns = [
            ['label' => 'Name', 'column' => 'name', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Email', 'column' => 'email', 'isData' => true,'hasRelation'=> false],
  
            ['label' => 'Action', 'column' => 'action', 'isData' => false,'hasRelation'=> false],
        ];

        $user = ModelsUser::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage, ['*'], 'page');

        return view('livewire.user', compact('user', 'columns'));
    }

    public function customFormat($column, $data)
    {
        switch ($column) {
            case 'created_at':
                $parsedDate = \Carbon\Carbon::parse($data);
                return $parsedDate->diffForHumans();
            default:
                return $data;
        }
    }

    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelUser()
    {
        $this->isEditUser = false;
        $this->resetFields();
    }

        /**
     * update the user data
     * @return void
     */
    public function updateUser()
    {
        try {
            ModelsUser::whereId($this->id)->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            session()->flash('success','User Updated Successfully!!');
            $this->resetFields();
            $this->isEditUser = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }

    public function deleteUser($id)
    {
        ModelsUser::find($id)->delete();
    }
}

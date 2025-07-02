<div>
        @section('title', 'Customers')
        <x-slot name="header">
            <x-slot name="title">
                {{ __('Customers') }}
            </x-slot>

            <x-slot name="subtitle">
                {{ __('Manage All Customers.') }}
            </x-slot>
        </x-slot>
        
        @if($isEditUser)
            @include('livewire.user.edit')    
        @endif
        {{-- @include('livewire.customers.delete') --}}
        <div class="row row-cards">
            <div class="col-12">
                <x-table :columns="$columns" :page="$page" :perPage="$perPage" :items="$user" :sortColumn="$sortColumn" :sortDirection="$sortDirection" editUser="true">
                    <x-slot name="title">
                        {{"User"}}
                    </x-slot>
                </x-table>
            </div>
        </div>
</div>

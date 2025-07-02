@props([
    'sortColumn',
    'items',
    'columns',
    'page',
    'perPage',
    'sortDirection',
    'isEdit' => false,
    'routeEdit' => null,
    'routeView' => null,
])

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-muted">
                Show
                <div class="mx-2 d-inline-flex">
                    <p class="badge badge-secondary" wire:model.live="perPage" id="perPage"> {{ $perPage }}</p>
                </div>
                entries
            </div>
            <div class="ms-auto text-muted">
                Search:
                <div class="ms-2 d-inline-block">
                    <input wire:model.live.debounce.300ms="search" type="text" class="form-control form-control-sm"
                        aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <x-table-head :columns="$columns" :sortColumn="$sortColumn" :sortDirection="$sortDirection" />
            <x-table-body :isCustomButton="false" :isEdit="$isEdit" :routeEdit="$routeEdit" :routeView="$routeView" :items="$items" :columns="$columns" :page="$page"
                :perPage="$perPage" />
        </table>
    </div>
    <div class="card-footer d-flex align-items-center">
        <div class="d-flex">
            <div class="d-flex gap-4 align-items-center mb-3">
                <label for="perPage">Per Page</label>
                <select class="form-select" wire:model.live="perPage" id="perPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>

        {{ $items->links() }}
       
    </div>
</div>
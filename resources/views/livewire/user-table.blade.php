<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Cari pengguna...">
        </div>
        <div class="col-md-8 text-end">
            <button type="button" wire:click="createUser" class="btn btn-outline-primary">Tambah Pengguna Baru</button>
        </div>
    </div>

    @if ($showUserForm)
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">{{ $isEditMode ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}</h6>
                <button type="button" class="btn-close" wire:click="resetForm"></button>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="saveUser">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" wire:model="name" id="name"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model="email" id="email"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Input Role --}}
                    <div class="mb-3">
                        <label for="role" class="form-label">Peran</label>
                        <select wire:model="role" id="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="">Pilih Peran</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->name }}">{{ ucfirst($r->name) }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi
                            {{ $isEditMode ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
                        <input type="password" wire:model="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" wire:model="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror">
                    </div>

                    <div class="text-end">
                        <button type="button" wire:click="resetForm" class="btn btn-light me-2">Batal</button>
                        <button type="submit"
                            class="btn btn-primary">{{ $isEditMode ? 'Simpan Perubahan' : 'Tambah Pengguna' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%;">No.</th>
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        Nama
                        @if ($sortField === 'name')
                            <i class="ph-caret-{{ $sortAsc ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        @if ($sortField === 'email')
                            <i class="ph-caret-{{ $sortAsc ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('role')" style="cursor: pointer;">
                        Peran
                        @if ($sortField === 'role')
                            <i class="ph-caret-{{ $sortAsc ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->roles->pluck('name')->first() ? ucfirst($user->roles->pluck('name')->first()) : 'N/A' }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <button type="button" wire:click="editUser({{ $user->id }})"
                                    class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Pengguna">
                                    <i class="ph-pencil"></i>
                                </button>
                                <button type="button" wire:click="deleteUser({{ $user->id }})"
                                    class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Hapus Pengguna"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                    <i class="ph-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada pengguna ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row gy-3">
            <div class="col-sm-4 ms-auto text-end">
                <a href="{{ route('users.create') }}" wire:navigate class="btn btn-primary"><i
                        class="las la-plus me-1"></i> Add
                    User</a>
            </div>
        </div>

        <!-- search bar-->
        <div class="row mb-3 mt-3">
            <div class="col-12">
                <form method="GET" action="">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-3">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search...">
                        </div>
                        <div class="col-md-2">
                            <select wire:model.live="statusFilter" class="form-select">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-hover table-nowrap align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th wire:click="sortBy('id')" style="cursor:pointer"># @if($sortField === 'id')
                                            @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                        @endif
                                        </th>
                                        <th wire:click="sortBy('name')" style="cursor:pointer">
                                            Name
                                            @if($sortField === 'name')
                                                @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                            @endif
                                        </th>
                                        <th wire:click="sortBy('email')" style="cursor:pointer">
                                            Email
                                            @if($sortField === 'email')
                                                @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                            @endif
                                        </th>
                                        <th wire:click="sortBy('is_active')" style="cursor:pointer">
                                            Status
                                            @if($sortField === 'is_active')
                                                @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                            @endif
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                                            </td>
                                            {{-- <td>{{ $user->name }}</td> --}}
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- Profile Picture --}}
                                                    @if($user->profile_picture)
                                                        <img src="{{ asset('storage/' . $user->profile_picture) }}" width="40"
                                                            height="40" class="rounded-circle me-2">
                                                    @else
                                                        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                                                            width="40" height="40" class="rounded-circle me-2">
                                                    @endif

                                                    {{-- User Name --}}
                                                    <span>{{ $user->name }}</span>
                                                </div>

                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="toggle{{ $user->id }}"
                                                        wire:click="toggleStatus({{ $user->id }})" {{ $user->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="toggle{{ $user->id }}">
                                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" wire:navigate
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                {{-- <button class="btn btn-sm btn-danger"
                                                    wire:click="confirmDelete({{ $user->id }})">
                                                    Delete
                                                </button> --}}
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="confirmDelete({{ $user->id }})" wire:loading.attr="disabled"
                                                    wire:target="delete({{ $user->id }})">

                                                    <span wire:loading.remove wire:target="delete({{ $user->id }})">
                                                        Delete
                                                    </span>

                                                    <span wire:loading wire:target="delete({{ $user->id }})">
                                                        <span class="spinner-border spinner-border-sm me-1" role="status"
                                                            aria-hidden="true"></span>
                                                        Deleting...
                                                    </span>
                                                </button>


                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No users found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="mt-3 ps-3 pe-3">
                                {{ $users->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('confirmDelete', ({ id }) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', id);
                }
            });
        });
    });
</script>

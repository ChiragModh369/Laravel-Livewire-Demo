<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="mb-sm-0">
                        <a href="{{ route('users.index') }}" wire:navigate class="btn btn-sm btn-secondary">
                            Go Back
                        </a>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row g-3">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header rounded-top">
                        <h4>Add User</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store" class="row g-3">
                            @csrf
                            @foreach($users as $key => $user)
                                <div class="card mb-3 position-relative">
                                    <div class="card-body">
                                        <!-- Delete Icon at Top Left -->
                                        <button type="button" class="btn btn-link text-danger position-absolute top-0 end-0 m-2 p-0" wire:click="removeUser({{ $key }})" aria-label="Remove this user">
                                            <i class="las la-trash-alt" style="font-size: 1.5rem;"></i>
                                        </button>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="fullnameInput_{{ $key }}" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="users.{{ $key }}.name" id="fullnameInput_{{ $key }}">
                                                @error('users.' . $key . '.name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail_{{ $key }}" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="users.{{ $key }}.email" id="inputEmail_{{ $key }}">
                                                @error('users.' . $key . '.email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword_{{ $key }}" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" wire:model="users.{{ $key }}.password" id="inputPassword_{{ $key }}">
                                                @error('users.' . $key . '.password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputGender_{{ $key }}" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-select" wire:model="users.{{ $key }}.is_active" id="inputGender_{{ $key }}">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('users.' . $key . '.is_active') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" wire:click="addUser">Add User</button>
                                <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Save</span>
                                    <span wire:loading>Saving...</span>
                                </button>
                            </div>
                        </form>
                        @if (session()->has('message'))
                            <div class="alert alert-success mt-3">{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

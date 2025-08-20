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
                            <div class="col-md-6">
                                <label for="fullnameInput" class="form-label">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" wire:model="password">
                                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputGender" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" wire:model="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('is_active') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Save</span>
                                        <span wire:loading>Saving...</span>
                                    </button>
                                    {{-- <button type="submit" class="btn btn-success">Create</button> --}}
                                    {{-- <a href="{{ route('users.index') }}" wire:navigate class="btn btn-secondary">Back</a> --}}
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

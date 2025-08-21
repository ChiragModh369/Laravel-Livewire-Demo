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
                            <li class="breadcrumb-item active">Update User</li>
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
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update" class="row g-3">
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
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <select class="form-select" wire:model.live="countryId">
                                    <option value="">-- Select Country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('countryId') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                {{-- Normal dropdown (shows when not loading) --}}
                                <select class="form-select" wire:model.live="stateId" wire:loading.remove
                                    wire:target="countryId">
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>

                                {{-- Loading dropdown (only shows while states are being fetched) --}}
                                <select class="form-select" disabled wire:loading wire:target="countryId">
                                    <option>Loading...</option>
                                </select>
                                @error('stateId') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Profile Picture</label><br>

                                @if($profile_picture)
                                    <img src="{{ asset('storage/' . $profile_picture) }}" alt="Profile" width="80"
                                        class="rounded mb-2">
                                @endif

                                @if($new_profile_picture)
                                    <div class="mb-2">
                                        <span class="text-muted">Preview:</span><br>
                                        <img src="{{ $new_profile_picture->temporaryUrl() }}" alt="Preview" width="80"
                                            class="rounded">
                                    </div>
                                @endif

                                <input type="file" wire:model="new_profile_picture" class="form-control">

                                <div wire:loading wire:target="new_profile_picture" class="text-muted mt-1">
                                    Uploading...
                                </div>

                                @error('new_profile_picture') <span class="text-danger">{{ $message }}</span>@enderror
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
                                {{-- <div class="text-end"> --}}
                                    {{-- <button type="submit" class="btn btn-success">Update</button> --}}
                                    <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Update</span>
                                        <span wire:loading>
                                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                                aria-hidden="true"></span>
                                            Updating...
                                        </span>
                                    </button>
                                    {{--
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

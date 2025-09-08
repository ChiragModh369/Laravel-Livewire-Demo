@extends('layouts.master')
@section('content')
    <style>
        #users-table_filter input {
            width: 200px;
            /* set your desired width */
            max-width: 100%;
            /* keeps it responsive */
        }
    </style>
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

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('users.create') }}" wire:navigate class="btn btn-primary btn-sm me-2"
                            aria-label="Add a single user">
                            <i class="las la-plus me-1"></i> Add User
                        </a>
                        <a href="{{ route('user-fields') }}" wire:navigate class="btn btn-success btn-sm"
                            aria-label="Add multiple users at once">
                            <i class="las la-users me-1"></i> Add Multiple Users
                        </a>
                    </div>
                </div>
            </div>

            <!-- search bar-->
            {{-- <div class="row mb-3 mt-3">
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
            </div> --}}

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
@endsection

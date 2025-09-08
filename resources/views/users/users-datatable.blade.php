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
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-2">
                            <select id="status-filter" class="form-select">
                                <option value="">All Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

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
        <script>
            $(document).ready(function () {
                let table = window.LaravelDataTables['users-table'];

                // Pass filter params in ajax request
                table.on('preXhr.dt', function (e, settings, data) {
                    data.is_active = $('#status-filter').val();
                });

                // Trigger reload on filter change
                $('#status-filter').on('change keyup', function () {
                    table.ajax.reload();
                });
            });

            $(document).on('change', '.toggle-status', function () {
                let userId = $(this).data('id');
                let checkbox = $(this);
                let label = $(this).siblings('label');

                $.ajax({
                    url: "{{ route('users.toggle-status') }}",
                    type: "POST",
                    data: {
                        id: userId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            label.text(response.status);
                        }
                    },
                    error: function () {
                        alert("Something went wrong!");
                        checkbox.prop('checked', !checkbox.prop('checked')); // rollback toggle
                    }
                });
            });

            $(document).on('click', '.delete-user', function () {
                let url = $(this).data('url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function () {
                                $('#users-table').DataTable().ajax.reload();

                                Swal.fire(
                                    "Deleted!",
                                    "User has been deleted.",
                                    "success"
                                );
                            },
                            error: function () {
                                Swal.fire(
                                    "Error!",
                                    "Something went wrong while deleting.",
                                    "error"
                                );
                            }
                        });
                    }
                });
            });


        </script>
    @endpush
@endsection

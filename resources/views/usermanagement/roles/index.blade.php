@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'User Roles' }}
@endsection

@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/dataTables.bootstrap5.min.css') }}"> --}}
@endpush

@section('content')
    <div class="card">
        <div class="card-body" style="overflow: auto">
            <div class="mb-3">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <a href="{{route('backend.roles.create')}}">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                            <i class="ti ti-user-plus fs-4 me-2"></i>
                            User Role
                        </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tblRole" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Permission</th>
                            {{-- <th>Golongan</th>
                            <th>Jabatan</th> --}}
                            {{-- <th>Subdit</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-role_permissions.js') }}"></script>
@endpush


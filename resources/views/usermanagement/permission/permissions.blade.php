@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Daftar Pejabat' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/select2/dist/css/select2.min.css') }}">
    <style>
        .select2-search--dropdown .select2-search__field {
            text-transform: uppercase !important;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">User Permissions</h5>
            <div class="card" id="form-input">
                <div class="card-body">
                    <form id="frmPermissions" action="{{ route('backend.permissions.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Module
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="txtModule" id="txtModule">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            @foreach ( $module_name as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text txtModule-error"></span>

                                    </div>
                                    <input type="text" name="txtName" id="txtName" hidden>
                                    <span class="text-danger error-text txtName-error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tingkat Permission
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="txtPermissions" id="txtPermissions">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            <option value="create">Create</option>
                                            <option value="list">Read</option>
                                            <option value="edit">Update</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        <span class="text-danger error-text txtPermissions-error"></span>
                                    </div>
                                    <input type="text" id="txtUUID" name="txtUUID" hidden>
                                    <input type="text" id="id_permissions" name="id_permissions" hidden>
                                </div>
                            </div>

                            <div class="mb-3 form-group">
                                <div class="d-flex justify-content-start gap-3" style="margin-top:20px">
                                    <button type="submit" name="save" id="save"
                                        class="btn btn-primary">Submit</button>
                                    <button type="button" onclick="updateData()" name="update" id="update"
                                        class="btn btn-success">Update</button>
                                    <button type="button" onclick="clearData()" name="cancel" id="cancel"
                                        class="btn btn-light-danger text-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="mb-3" id="btnTambah">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center"
                            onclick="addData()">
                            <i class="ti ti-user-check fs-4 me-2"></i>
                            Permissions
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblPermissions" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Permission</th>
                            <th>Tingkat Permission</th>
                            <th>Nama Module</th>
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
    <script src="{{ asset('bootstrap/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-permissions.js') }}"></script>
@endpush

@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Module List' }}
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
            <h5 class="card-title fw-semibold mb-4">Module List</h5>
            <div class="card" id="form-input">
                <div class="card-body">
                    <form id="frmModule" action="{{ route('backend.module.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="txtName">Nama Module
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtName" id="txtName" class="form-control"
                                            maxlength="100" placeholder="Contoh: Data Kepegawaian" autocomplete="off">
                                            <span class="text-danger error-text txtName-error"></span>
                                    </div>
                                    <input type="text" id="txtUUID" name="txtUUID" hidden>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="txtAlias">Prefix Module
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtAlias" id="txtAlias" class="form-control"
                                            maxlength="100" placeholder="Contoh: Dapeg" autocomplete="off">
                                            <span class="text-danger error-text txtAlias-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Status Module
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="txtStatus" id="txtStatus">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            <option value="0">Active</option>
                                            <option value="1">Disable</option>
                                        </select>
                                        <span class="text-danger error-text txtStatus-error"></span>
                                    </div>
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
                            <i class="ti ti-settings fs-4 me-2"></i>
                            Module
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblModule" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Module</th>
                            <th>Status</th>
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-module.js') }}"></script>
@endpush

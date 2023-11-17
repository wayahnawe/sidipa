@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Organisasi/Satuan Kerja/Sub Direktorat' }}
@endsection

@push('styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Organisasi/Satuan Kerja/Sub Direktorat</h5>
            <div class="card" id="form-input">
                <div class="card-body">
                    <form id="tblOrgchart" action="{{ route('backend.organisasi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Prefix
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtPrefix" id="txtPrefix" class="form-control"
                                            maxlength="10" placeholder="Contoh: SATKER I" style="text-transform:uppercase">
                                        <span class="text-danger error-text txtPrefix-error"></span>
                                    </div>
                                    <input type="text" id="txtUUID" hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Satuan Kerja/Sub Direktorat
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtSubdit" id="txtSubdit" class="form-control"
                                            maxlength="100" placeholder="Contoh: Satuan Kerja I"
                                            style="text-transform:uppercase">
                                        <span class="text-danger error-text txtSubdit-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

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
            <div class="mb-3" id="AddButtonGol">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center"
                            onclick="addData()">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Satuan Kerja
                        </button>
                        {{-- </a> --}}
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblDipa" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Satuan Kerja / Subdit
                            <th>Prefix</th>
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-orgchart.js') }}"></script>
@endpush

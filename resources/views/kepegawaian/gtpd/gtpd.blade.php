@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Golongan & Tingkat Perjalanan Dinas' }}
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
            <h5 class="card-title fw-semibold mb-4">Golongan & Tingkat Perjalanan Dinas</h5>
            <div class="card" id="InputGolongan">
                <div class="card-body">
                    <form id="tblGTPD" action="{{ route('backend.gtpd.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Pangkat
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtPangkat" id="txtPangkat" class="form-control"
                                            maxlength="50" placeholder="Contoh: Juru Muda">
                                        <span class="text-danger error-text txtPangkat-error"></span>
                                        <input type="text" id="txtUUID" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Golongan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="txtGolongan" id="txtGolongan" class="form-control"
                                            maxlength="50" placeholder="Contoh: I/II/III/IV "
                                            style="text-transform: uppercase">
                                        <span class="text-danger error-text txtGolongan-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Grade
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="TxtGrade" id="TxtGrade">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            <option value="a">a</option>
                                            <option value="b">b</option>
                                            <option value="c">c</option>
                                            <option value="d">d</option>
                                            <option value="e">e</option>
                                        </select>
                                        <span class="text-danger error-text TxtGrade-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 form-group">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label>Tingkat Perjalanan Dinas
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="controls">
                                            <select class="select2 form-control pejabat" style="width: 100%; height: 36px"
                                                name="TxtPD" id="TxtPD">
                                                <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                            <span class="text-danger error-text TxtPD-error"></span>
                                        </div>
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
            <div class="mb-3" id="ButtonGTP">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center"
                            onclick="addData()">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Golongan & TPD
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblDipa" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Golongan</th>
                            <th>Grade</th>
                            <th>Nama Pangkat</th>
                            <th>TPD</th>
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-gtpd.js') }}"></script>
@endpush

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
            <h5 class="card-title fw-semibold mb-4">Daftar Pejabat</h5>
            <div class="card" id="form-input">
                <div class="card-body">
                    <form id="tblDaftarPejabat" action="{{ route('backend.pejabat.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Pejabat
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="TxtPegawai" id="TxtPegawai">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            @foreach ($employee as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text TxtTPD-error"></span>
                                    </div>
                                    <input type="text" id="txtUUID" name="txtUUID" hidden>
                                    <input type="text" id="id_pegawai" name="id_pegawai" hidden>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Jabatan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            name="TxtTPD" id="TxtTPD">
                                            <option value="" disabled hidden selected>Pilih Salah Satu</option>
                                            <option value="KABAG/KASUBDIT">KABAG/KASUBDIT</option>
                                            <option value="KPA">KPA</option>
                                            <option value="PPK">PPK</option>
                                            <option value="BENDAHARA">BENDAHARA</option>
                                            <option value="KEPALA SATKER">KEPALA SATKER</option>
                                            <option value="KPPN">KPPN</option>
                                        </select>
                                        <span class="text-danger error-text TxtTPD-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="col-md-6 mb-3 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" name="pejabat">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pelaksana Harian
                                                    </label>
                                                </div>
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
            <div class="mb-3" id="AddButtonGol">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                           <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center"
                            onclick="addData()">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Daftar Pejabat
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblPejabat" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Pejabat</th>
                            <th>Jabatan</th>
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-pejabat.js') }}"></script>
@endpush

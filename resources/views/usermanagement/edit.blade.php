@extends('layouts.dashboard.app')

@section('title')
    {{ 'Tambah Tarif Uang Harian' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/select2/dist/css/select2.min.css') }}">
    <style>
        .hide {
            display: none;
        }

        .select2-search--dropdown .select2-search__field {
            text-transform: uppercase !important;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Tambah User</h5>
            <form id="tblUserInput" action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtNama" name="txtNama" placeholder=""
                                    autocomplete="email">
                                <label for="txtNama">Nama Lengkap
                                    <span class="text-danger">*</span>
                                </label>
                                <span class="text-danger error-text txtNama-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                                    placeholder="Contoh :" autocomplete="off" disabled>
                                <label for="txtEmail">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <span class="text-danger error-text txtEmail-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="txtRole">User Role</label>
                            <select class="select2 form-control custom-select" id="txtRole" name="txtRole"
                                style="width: 100%; height: 36px; margin: 10px 0">
                                <option value="" disabled selected hidden>Pilih Salah Satu</option>
                                {{-- @foreach ($currency as $data)
                                    <option value="{{ $data->iso_code }}">{{ $data->iso_code }}</option>
                                @endforeach --}}
                            </select>
                            <span class="text-danger error-text txtRole-error"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Status</label>
                            <div class="controls">
                                <div class="row py-2">
                                    <div class="col-md-8 col-xl-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input danger" type="radio" name="isactive"
                                                id="isactive-true" value="1">
                                            <label for="isactive-true" class="form-check-label" for="">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input danger" type="radio" name="isactive"
                                                id="isactive-false" value="0" checked>
                                            <label for="isactive-false" class="form-check-label" for="">Disabled</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-md-flex align-items-center mt-3">
                        <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-send me-2 fs-4"></i>
                                    Submit
                                </div>
                            </button>
                            <a type="button" class="btn btn-danger font-medium rounded-pill px-4"
                                href="{{ route('backend.users.index') }}">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-circle-x me-2 fs-4"></i>
                                    Batal
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bootstrap/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa_users_update.js') }}"></script>
@endpush

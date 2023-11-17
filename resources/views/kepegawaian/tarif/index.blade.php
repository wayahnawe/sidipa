@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Surat Belanja Umum' }}
@endsection

@push('styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <a href="{{route('backend.tarif.create')}}">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Tarif Uang Harian
                        </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tblTarif" class="table table-striped" style="width:100%; height:100%">
                    <thead>
                        <tr>
                            <th>Kota</th>
                            <th>Provinsi/Negara</th>
                            <th>Uang Saku (Full Board)</th>
                            <th>Uang Harian (Global)</th>
                            <th>Mata Uang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('bootstrap/dist/js/dipa/dipa-tarif.js') }}"></script>
@endpush

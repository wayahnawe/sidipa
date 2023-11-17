@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Daftar Pegawai' }}
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
                        <a href="{{route('backend.employee.create')}}">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                            <i class="ti ti-user-plus fs-4 me-2"></i>
                            Pegawai
                        </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tblDipa" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-employee.js') }}"></script>
@endpush


@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Perjalanan Dinas' }}
@endsection

@push('styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <div class="d-flex justify-content-end">
                    <div class="btn-group mb-2 ">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Perjalanan Dinas
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{route('backend.perjalanan_dinas.domestik')}}">Dalam Negeri</a></li>
                    <li>
                        <a class="dropdown-item" href="{{route('backend.perjalanan_dinas.internasional')}}">Luar Negeri</a>
                    </li>
                </ul>
            </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tblJalDin" class="table table-striped" style="width:100%; height:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Keperluan</th>
                            <th>Tgl Berangkat</th>
                            <th>Tgl Kembali</th>
                            <th>Tujuan</th>
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
    <script src="{{asset('bootstrap/dist/js/moment.min.js')}}"></script>
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa_spd.js') }}"></script>
@endpush

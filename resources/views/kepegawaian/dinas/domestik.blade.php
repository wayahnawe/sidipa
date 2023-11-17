@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Surat Tugas Perjalanan Dinas' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/select2/dist/css/select2.min.css') }}">
    <style>
        .select2-search--dropdown .select2-search__field {
            text-transform: uppercase !important;
        }

        .select2-selection__choice {
            background-color: #539bff !important;
            border-color: #539bff !important;
            color: #fff !important;
            /* border-color: #539bff !important; */
        }

        .select2-selection__choice__remove {
            border-right: 0px !important;
            color: #fff !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {

            text-transform: uppercase;
        }

        .offcanvas.offcanvas-end {
            top: 87px !important;
            border-radius: 7px;
        }

        .customizer {
            width: 45% !important;
        }

        .customizer-btn {
            position: inherit !important;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="frmInput" class="mt-4" action="{{ route('backend.perjalanan_dinas.store') }}" method="POST"
                enctype="multipart/form-data">
                <input type="text" name="type_perjalanan" id="type_perjalanan" value="domestik" hidden>
                <div class="form-with-tabs">
                    <h5 class="card-title fw-semibold mb-4">Detail Perjalanan Dinas</h5>
                    <div class="card">
                        <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold active"
                                    id="pills-personal-info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-info"
                                    type="button" role="tab" aria-controls="pills-personal-info" aria-selected="true">
                                    Surat Tugas </button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                    id="pills-account-details-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-account-details" type="button" role="tab"
                                    aria-controls="pills-account-details" aria-selected="false" tabindex="-1"> Checklist
                                    Biaya
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                    id="pills-social-links-tab" data-bs-toggle="pill" data-bs-target="#pills-other-links"
                                    type="button" role="tab" aria-controls="pills-other-links" aria-selected="false"
                                    tabindex="-1"> Keterangan </button>
                            </li> --}}
                        </ul>
                        <div class="card-body p-4">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="pills-personal-info" role="tabpanel"
                                    aria-labelledby="pills-personal-info-tab" tabindex="0">
                                    @include('kepegawaian.dinas.__domestik__.surat_tugas')
                                </div>
                                <div class="tab-pane fade" id="pills-account-details" role="tabpanel"
                                    aria-labelledby="pills-account-details-tab" tabindex="0">
                                    @include('kepegawaian.dinas.__domestik__.check_list')
                                </div>
                                <div class="tab-pane fade" id="pills-other-links" role="tabpanel"
                                    aria-labelledby="pills-other-links-tab" tabindex="0">
                                    <div class="row">
                                        {{-- @include('kepegawaian.kepegawaian.__ create__.data_keterangan') --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-schedule-links" role="tabpanel"
                                    aria-labelledby="pills-schedule-links-tab" tabindex="0">
                                    <div class="row">
                                        {{-- @include('kepegawaian.kepegawaian.__ create__.data_schedule') --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-history-links" role="tabpanel"
                                    aria-labelledby="pills-history-links-tab" tabindex="0">
                                    <div class="row">
                                        {{-- @include('kepegawaian.kepegawaian.__ create__.data_history') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-end gap-3">
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                        <a href="{{ route('backend.perjalanan_dinas.index') }}"
                            class="btn btn-light-danger text-danger">Batal</a>
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
    {{-- <script src="{{ asset('bootstrap/dist/js/simplebar.min.js')}}"></script> --}}
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa_spd_create.js') }}"></script>
    {{-- <script type="text/javascript">
        var DataGapok = document.getElementById('DataGapok');
        DataGapok.addEventListener('keyup', function(e) {

            DataGapok.value = formatAngka(this.value);
        });

        function formatAngka(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                angka = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? ',' : '';
                angka += separator + ribuan.join(',');
            }

            angka = split[1] != undefined ? angka + ',' + split[1] : angka;
            return prefix == undefined ? angka : (angka ? angka : '');
        }
        $("#DataGapok").change(function() {

            var DataGapok = $("#DataGapok").val();
            var TextGapok = DataGapok.trim() && (n = parseInt(DataGapok.replace(/[^\d.]/g, "")));
            $("#txtGapok").val(TextGapok);


        });
    </script> --}}

@endpush

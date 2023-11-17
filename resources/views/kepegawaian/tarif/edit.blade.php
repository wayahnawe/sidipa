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
            <h5 class="mb-3">Tarif Uang Harian</h5>
            <form id="tblTarif" action="{{ route('backend.tarif.update',$tarif->id) }}" method="POST" enctype="multipart/form-data">
                {{method_field('PUT')}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtNegara" name="txtNegara" value="{{$tarif->nama}}" placeholder=""
                                    style="text-transform: uppercase" disabled>
                                <label for="txtNegara">Negara/Provinsi
                                    <span class="text-danger">*</span>
                                </label>
                                <span class="text-danger error-text txtNegara-error"></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtLokasi" name="txtLokasi" value="{{$tarif->lokasi}}"
                                    placeholder="Contoh :" style="text-transform: uppercase">
                                <label for="txtLokasi">Kota/Lokasi
                                    <span class="text-danger">*</span>
                                </label>
                                <span class="text-danger error-text txtLokasi-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="txtCurrency">Mata Uang</label>
                            <select class="select2 form-control custom-select" id="txtCurrency" name="txtCurrency"
                                style="width: 100%; height: 36px; margin: 10px 0">
                                <option value="" disabled selected hidden>Pilih Salah Satu</option>
                                @foreach ($currency as $data)
                                    <option value="{{ $data->iso_code }}" {{ $tarif->iso_code == $data->iso_code ? 'selected' : '' }}>{{ $data->iso_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtUangSaku">Uang Saku (Fullboard)</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text kurs-text hide"></span>
                                <input type="text" id="txtUangSaku" name="txtUangSaku"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    maxlength="20" class="form-control currency text-end" aria-label=""
                                    placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_saku) }}">
                                <span class="input-group-text">,00</span>
                                <input type="text" id="UangSaku" name="UangSaku" value="{{ $tarif->uang_saku }}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="collapsible-section mb-3">
                        <div class="accordion accordion-flush position-relative overflow-hidden" id="accordionFlushExample">
                            <div class="accordion-item mb-3 shadow-none border rounded-top">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button
                                        class="accordion-button fs-4 fw-semibold px-3 py-6 lh-base border-0 rounded-top collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="false" aria-controls="flush-collapseOne"> Uang Harian </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                    style="">
                                    <div class="accordion-body px-3 fw-normal">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtUangHarianGlobal"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Global</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3 column-currency">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtUangHarianGlobal"
                                                                name="txtUangHarianGlobal"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end" aria-label=""
                                                                placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_harian) }}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="UangHarianGlobal"
                                                                name="UangHarianGlobal" value="{{  $tarif->uang_harian  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtUangHarianGolI"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Gol.
                                                        I/II</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3 column-currency">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtUangHarianGolI"
                                                                name="txtUangHarianGolI"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_harian_1) }}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="UangHarianGolI"
                                                                name="UangHarianGolI" value="{{  $tarif->uang_harian_1  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtUangHarianGolIII"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Gol.
                                                        III</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtUangHarianGolIII"
                                                                name="txtUangHarianGolIII"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_harian_2) }}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="UangHarianGolIII"
                                                                name="UangHarianGolIII" value="{{  $tarif->uang_harian_2  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtUangHarianGolIV"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Gol.
                                                        IV</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtUangHarianGolIV"
                                                                name="txtUangHarianGolIV"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_harian_3) }}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="UangHarianGolIV"
                                                                name="UangHarianGolIV" value="{{  $tarif->uang_harian_3  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtUangHarianGolEselon"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Eselon
                                                        II</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtUangHarianGolEselon"
                                                                name="txtUangHarianGolEselon"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{ number_format($tarif->uang_harian_4) }}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="UangHarianGolEselon"
                                                                name="UangHarianGolEselon" value="{{  $tarif->uang_harian_4  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3 shadow-none border">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed fs-4 fw-semibold px-3 py-6 lh-base border-0"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                        aria-expanded="false" aria-controls="flush-collapseTwo"> Tarif Hotel
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body px-3 fw-normal">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="Hotel1"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 1</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="Hotel1" name="Hotel1"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{number_format($tarif->bintang_1)}}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="txtBintang1" name="txtBintang1" value="{{  $tarif->uang_bintang_1  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="Hotel3"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 2</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="Hotel2"
                                                                name="Hotel2"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{number_format($tarif->bintang_2)}}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="txtBintang2" name="txtBintang2" value="{{  $tarif->uang_bintang_2  }}"
                                                                hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="Hotel3"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 3</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="Hotel3" name="Hotel3"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{number_format($tarif->bintang_3)}}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="txtBintang3" name="txtBintang3" value="{{  $tarif->uang_bintang_3 }}"
                                                                hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="Hotel4"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 4</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="Hotel4"
                                                                name="Hotel4"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{number_format($tarif->bintang_4)}}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="txtBintang4"
                                                                name="txtBintang4" value="{{  $tarif->uang_bintang_4  }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="Hotel5"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 5</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="Hotel5" name="Hotel5"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency text-end"
                                                                aria-label="" placeholder="Contoh: 1,000,000" value="{{number_format($tarif->bintang_5)}}">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="txtBintang5" name="txtBintang5" value="{{  $tarif->uang_bintang_5  }}"
                                                                hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                                <div class="mb-4 row align-items-left">
                                                    <label for="txtHotelGolEselon"
                                                        class="form-label fw-semibold col-sm-3 col-form-label text-start">Bintang 5</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text kurs-text hide"></span>
                                                            <input type="text" id="txtHotelGolEselon"
                                                                name="txtHotelGolEselon"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="20" class="form-control currency"
                                                                aria-label="" placeholder="Contoh: 1,000,000">
                                                            <span class="input-group-text">,00</span>
                                                            <input type="text" id="HotelGolEselon"
                                                                name="HotelGolEselon" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="BiayaTaxi">Biaya Taxi</label>
                            <div class="input-group mb-3" id="txtCurTaxi">
                                <span class="input-group-text kurs-text hide"></span>
                                <input type="text" id="txtBiayaTaxi" name="txtBiayaTaxi"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    maxlength="20" class="form-control currency text-end" aria-label=""
                                    placeholder="Contoh: 1,000,000" value="{{number_format($tarif->taxi)}}">
                                <span class="input-group-text">,00</span>
                                <input type="text" id="BiayaTaxi" name="BiayaTaxi" hidden>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 hide" id="colKurs">
                            <label for="txtTukarKurs">Kurs IDR</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">IDR</span>
                                <input type="text" id="txtTukarKurs" name="txtTukarKurs"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    maxlength="20" class="form-control currency text-end" aria-label=""
                                    placeholder="Contoh: 1,000,000" value="{{number_format($tarif->kurs)}}">
                                <span class="input-group-text">,00</span>
                                <input type="text" id="TukarKurs" name="TukarKurs" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 mb-3">
                        <label>Type Perjalanan</label>
                        <div class="controls">
                            <div class="row py-2">
                                <div class="col-md-8 col-xl-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio" name="isdomestik"
                                            id="true" value="domestik" {{ $tarif->isdomestik == 'domestik' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">Dalam Negeri</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio" name="isdomestik"
                                            id="false" value="internasional" {{ $tarif->isdomestik == 'internasional' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">Luar Negeri</label>
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
                                    Update
                                </div>
                            </button>
                            <a type="button" class="btn btn-danger font-medium rounded-pill px-4" href="{{route('backend.tarif.index')}}">
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
    <script type="text/javascript">
        $("#txtCurrency").change(function() {
            const e = document.getElementById("txtCurrency");
            const value = e.value;
            const text = e.options[e.selectedIndex].text;
            $("span.kurs-text").each(function() {
                $(this).html(value);
                $(this).removeClass("hide");
            });
            if (value != 'IDR') {
                $("#colKurs").removeClass("hide");
            } else {
                $("#colKurs").addClass("hide");
            }
        });
        $(".currency").on({
            change: function() {
                let value_text = $(this).val();
                var text_value = value_text.trim() && (n = parseInt(value_text.replace(/[^\d.]/g, "")));
                const thisid = document.getElementById(this.id);
                thisid.nextElementSibling.nextElementSibling.value = text_value;
            }
        })
        $(".currency").on({
            keyup: function() {
                // let textCurrency = document.querySelector(".currency");
                let input_val = $(this).val();

                input_val = numberToCurrency(input_val);
                $(this).val(input_val);
            },
            blur: function() {
                let input_val = $(this).val();
                input_val = numberToCurrency(input_val, true, true);
                $(this).val(input_val);
            }
            // textCurrency.nextElementSibling.nextElementSibling.innerHTML = input_val;
        });

        var numberToCurrency = function(input_val, fixed = false, blur = false) {
            // don't validate empty input
            if (!input_val) {
                return "";
            }

            if (blur) {
                if (input_val === "" || input_val == 0) {
                    return 0;
                }
            }

            if (input_val.length == 1) {
                return parseInt(input_val);
            }
            input_val = '' + input_val;

            let negative = '';
            if (input_val.substr(0, 1) == '-') {
                negative = '-';
            }
            // check for decimal
            if (input_val.indexOf(".") >= 0) {
                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = left_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                if (fixed && right_side.length > 3) {
                    right_side = parseFloat(0 + right_side).toFixed(2);
                    right_side = right_side.substr(1, right_side.length);
                }

                // validate right side
                right_side = right_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                // Limit decimal to only 2 digits
                if (right_side.length > 2) {
                    right_side = right_side.substring(0, 2);
                }

                if (blur && parseInt(right_side) == 0) {
                    right_side = '';
                }

                // join number by .
                // input_val = left_side + "." + right_side;

                if (blur && right_side.length < 1) {
                    input_val = left_side;
                } else {
                    input_val = left_side + "." + right_side;
                }

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = input_val.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            if (input_val.length > 1 && input_val.substr(0, 1) == '0' && input_val.substr(0, 2) != '0.') {
                input_val = input_val.substr(1, input_val.length);
            } else if (input_val.substr(0, 2) == '0,') {
                input_val = input_val.substr(2, input_val.length);
            }

            return negative + input_val;
        };
    </script>
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-tarif-update.js') }}"></script>
@endpush

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
                                    placeholder="Contoh :" autocomplete="off">
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa_users_create.js') }}"></script>
@endpush

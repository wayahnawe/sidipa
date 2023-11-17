@extends('layouts.dashboard.app')

@section('title')
    {{ 'Tambah Tarif Uang Harian' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/select2/dist/css/select2.min.css') }}">
    <style>
        .r-separator {
            border-bottom: 1px solid #ebf1f6;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">User Role & Permission</h5>
            <form id="tblTarif" action="{{ route('backend.roles.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group r-separator">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtRoleName" name="txtRoleName"
                                    placeholder="" style="text-transform: capitalize">
                                <label for="txtNegara">Nama Role
                                    <span class="text-danger">*</span>
                                </label>
                                <span class="text-danger error-text txtRoleName-error"></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="txtAdministrator">Level Administrator</label>
                            <div class="form-floating mt-2 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input primary" type="checkbox" name="isadmin" id="isadmin"
                                        value="all_permissions">
                                    <label class="form-check-label" for="primary2-check">Permission All</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="row">
                        <h5>Daftar Permissions </h5>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input primary" type="checkbox" id="primary2-check"
                                        value="option1" checked="">
                                    <label class="form-check-label" for="primary2-check">Checked</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">

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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-tarif-create.js') }}"></script>
@endpush

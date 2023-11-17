@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'Anggaran DIPA' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/yearpicker.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card" id="form-input">
                <div class="card-body">
                    <form id="tblBudgetAnggaran" action="{{ route('backend.budget.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label>Tahun Anggaran
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" class="yearpicker form-control"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            placeholder="Contoh: 2023" name="tahun_anggaran" id="tahun_anggaran"
                                            autocomplete="off">
                                        <span class="text-danger error-text tahun_anggaran-error"></span>
                                    </div>
                                    <input type="text" id="txtUUID" name="txtUUID" hidden>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Kode Anggaran
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" style="text-transform: uppercase;"
                                            placeholder="Contoh:022.05.XX.XXXX.ABC" name="kode_anggaran" id="kode_anggaran"
                                            autocomplete="off">
                                        <span class="text-danger error-text kode_anggaran-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb3">
                                    <label>Budget Anggaran
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text kurs-text">IDR</span>
                                            <input type="text" id="txtBudget_Anggaran" name="txtBudget_Anggaran"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="20" class="form-control currency text-end" aria-label=""
                                                placeholder="Contoh: 1,000,000">
                                            <span class="input-group-text">,00</span>
                                            <input type="text" id="budget_anggaran" name="budget_anggaran" hidden>
                                            <span class="text-danger error-text budget_anggaran-error" style="position: absolute;top:40px"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <label>Nama Anggaran
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="nama_anggaran" id="nama_anggaran" class="form-control"
                                        placeholder="Contoh: Anggaran Belanja Umum" autocomplete="off" maxlength="120">
                                    <span class="text-danger error-text nama_anggaran-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3 form-group">
                            <div class="d-flex justify-content-start gap-3" style="margin-top:20px">
                                <button type="submit" name="save" id="save" class="btn btn-primary">Submit</button>
                                <button type="button" onclick="updateData()" name="update" id="update"
                                    class="btn btn-success">Update</button>
                                <button type="button" onclick="clearData()" name="cancel" id="cancel"
                                    class="btn btn-light-danger text-danger">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="mb-3" id="FormButton">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <button type="button"
                            class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center"
                            onclick="addData()">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Anggaran DIPA
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tblBudget" class="table table-striped" style="width:100%; height:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Kode Akun</th>
                            <th class="text-center">Nama Akun</th>
                            <th class="text-center">Budget</th>
                            <th class="text-center">Action</th>
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
    <script src="{{ asset('bootstrap/dist/js/yearpicker.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/jquery.mask.min.js') }}"></script>
    <script type="text/javascript">
        $("#txtCurrency").change(function() {
            const e = document.getElementById("currency");
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
    <script src="{{ asset('bootstrap/dist/js/dipa/dipa-budget.js') }}"></script>
@endpush

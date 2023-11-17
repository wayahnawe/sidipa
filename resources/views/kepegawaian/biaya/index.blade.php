@extends('layouts.dashboard.app')

@section('title')
    {{ 'Daftar Kategori Biaya' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Kategori Biaya</h5>
            <div class="card" id="InputGolongan">
                <div class="card-body">
                    <form action="">
                        <div class="mb-3 mt-3 form-group">
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <label>Kategori Biaya
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="TxtGolongan" id="TxtGolongan" class="form-control"
                                            maxlength="50" placeholder="Contoh: I/a">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="d-flex justify-content-end gap-3" style="margin-top:20px">
                                        <button type="submit" onclick="submitData()" name="save" id="save"
                                             class="btn btn-primary">Submit</button>
                                        <button type="submit" onclick="UpdateData()" name="update" id="update"
                                            class="btn btn-success">Update</button>
                                        <button type="submit" onclick="UpdateData()" name="update" id="update"
                                            class="btn btn-light-danger text-danger">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="mb-3" id="AddButtonGol">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-2">
                        <a href="{{ route('backend.employee.create') }}">
                            <button type="button"
                                class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                                <i class="ti ti-plus fs-4 me-2"></i>
                                Kategori Biaya
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Golonga
                            <th>Nama Pangkat</th>
                            <th>TPD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection


@push('scripts')
    <script src="{{ asset('bootstrap/dist/libs/jquery/dist/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/jquery/dist/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable-server-side.js') }}"></script>
@endpush

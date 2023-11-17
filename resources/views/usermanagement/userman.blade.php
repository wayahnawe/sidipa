@extends('layouts.dashboard.datatable')

@section('title')
    {{ 'User Management' }}
@endsection

@push('styles')
@endpush

@section('content')
<div class="card">
    <div class="card-body" style="overflow: auto">
        <div class="mb-3">
            <div class="d-flex justify-content-end">
                <div class="col-lg-2">
                    <a href="{{route('backend.users.create')}}">
                    <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                        <i class="ti ti-user-plus fs-4 me-2"></i>
                        User
                    </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tblUsers" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
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
<script src="{{ asset('bootstrap/dist/js/dipa/dipa-usersman.js') }}"></script>
@endpush

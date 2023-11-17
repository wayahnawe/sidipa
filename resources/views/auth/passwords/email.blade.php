@extends('layouts.auth.authentication')

@section('title')
    {{ 'Atut Ulang Password' }}
@endsection

@push('styles')
@endpush
@section('content')
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="login-page">
                <div class="col-xl-8 col-xxl-9">
                    <div class="d-none d-xl-flex align-items-center justify-content-center">
                        <img src="{{ asset('bootstrap/dist/images/backgrounds/sidipa.png') }}" alt="" class="img-fluid"
                            style="width: 100%; height:100vh">
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-3">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <img src="{{ asset('bootstrap/dist/images/logos/dipaonline-logo.png') }}"
                                style="padding:20px 0;align-items: center; height: auto; width: 100%;" alt="">
                            <div class="row">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            </div>
                            <div class="forgot-page">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <header class="mb-4">
                                            <h4 class="card-title">Atur Ulang Kata Sandi</h4>
                                        </header>
                                        <p>Masukkan e-mail yang terdaftar. Kami akan mengirimkan kode verifikasi untuk atur
                                            ulang kata sandi.</p>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                        {{ __('Kirim Verifikasi') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

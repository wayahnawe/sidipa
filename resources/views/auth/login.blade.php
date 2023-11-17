@extends('layouts.auth.authentication')

@section('title')
    {{ 'Login Page' }}
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
                            <div class="form-login" id="login-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="email" class="form-label"
                                            style="padding-left: 0">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="form-label"
                                            style="padding-left: 0">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check" style="padding-left: 1em !important">
                                                <input class="form-check-input primary" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label text-dark" for="flexCheckChecked" style="font-size: 18px;position:relative;margin-top:-15px">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <a class="text-primary fw-medium" href="{{route('password.request')}}">Forgot
                                                Password ?</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                            {{ __('Login') }}
                                        </button>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="fs-4 mb-0 fw-medium">New to SIDIPA?</p>
                                            <a class="text-primary fw-medium ms-2" href="{{route('register')}}">Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css" rel="stylesheet" />
    {{-- <script type="">
        const login_form = document.querySelector("#login-form");
const register_form = document.querySelector("#register-form");
const forgot_form = document.querySelector("#forgot-form");
const login_link = register_form.querySelector(".link-js");
const register_link = login_form.querySelector(".link-js");
const forgot_link = login_form.querySelector(".forgot-js");

login_link.addEventListener("click", () => {
    register_form.classList.remove("active");
    register_form.classList.add("non-active");
    login_form.classList.remove("non-active");
    login_form.classList.add("active");
});

register_link.addEventListener("click", () => {
    register_form.classList.remove("non-active");
    register_form.classList.add("active");
    login_form.classList.remove("active");
    login_form.classList.add("non-active");
});
forgot_link.addEventListener("click", () => {
    login_form.classList.remove("active");
    login_form.classList.add("non-active");
    forgot_form.classList.remove("non-active");
    forgot_form.classList.add("active");
});

$(document).ready(function () {

});

const passwordInput = document.querySelector(".pass-field input");
const confirmInput = document.querySelector(".confirm-field input");
const requirementList = document.querySelectorAll(".requirement-list li");

const passeye = document.querySelector(".pass-field i");
const confirmeye = document.querySelector(".confirm-field i");
// An array of password requirements with corresponding
// regular expressions and index of the requirement list item
// let passeye1 = document.querySelector(".pass-icon svg");
const requirements = [
    { regex: /.{8,}/, index: 0 }, // Minimum of 8 characters
    { regex: /[0-9]/, index: 1 }, // At least one number
    { regex: /[a-z]/, index: 2 }, // At least one lowercase letter
    { regex: /[^A-Za-z0-9]/, index: 3 }, // At least one special character
    { regex: /[A-Z]/, index: 4 }, // At least one uppercase letter
];
passwordInput.addEventListener("keyup", (e) => {
    requirements.forEach((item) => {
        // Check if the password matches the requirement regex
        const isValid = item.regex.test(e.target.value);
        const requirementItem = requirementList[item.index];
        // Updating class and icon of requirement item if requirement matched or not
        if (isValid) {
            requirementItem.classList.add("valid");
            requirementItem.firstElementChild.className = "ti ti-check text-success";
            requirementItem.lastElementChild.className = "text-success";

        } else {
            requirementItem.classList.remove("valid");
            requirementItem.firstElementChild.className = "ti ti-circle-x text-red";
            requirementItem.lastElementChild.className = "text-red";
        }
    });
});
passeye.addEventListener("click", function () {
    // console.log("clicked");
    // // Toggle the password input type between "password" and "text"
    passwordInput.type =
        passwordInput.type === "password" ? "text" : "password";
    // Update the eye icon class based on the password input type
    passeye.className = `ti ti-eye${
        passwordInput.type === "text" ? "" : "-off"
    }`;
});

confirmeye.addEventListener("click", function () {
    // // Toggle the password input type between "password" and "text"
    confirmInput.type =
        confirmInput.type === "password" ? "text" : "password";
    // Update the eye icon class based on the password input type
    confirmeye.className = `ti ti-eye${
        confirmInput.type === "text" ? "" : "-off"
    }`;
});

    </script> --}}
@endpush

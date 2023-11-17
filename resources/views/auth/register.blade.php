@extends('layouts.auth.authentication')

@section('title')
    {{ 'Registration Page' }}
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

                            <div class="register-page" id="register-form">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" autofocus autocomplete="off">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <div class="pass-field">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" autocomplete="off">
                                            <span class="pass-icon"><i class="ti ti-eye-off"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                            <div class="confirm-field">
                                                <input type="password" class="form-control" id="password-confirm"
                                                    name="password_confirmation" autocomplete="off">
                                                <span class="confirm-icon"><i class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                                {{ __('Login') }}
                                            </button>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <p class="fs-4 mb-0 fw-medium">Already Have Account?</p>
                                                <a class="text-primary fw-medium ms-2"
                                                    href="{{ route('login') }}">Login</a>
                                            </div>
                                        </div>
                                </form>
                                <div class="content">
                                    <p>Password must contains :</p>
                                    <ul class="requirement-list">
                                        <li>
                                            <i class="ti ti-circle-x text-red"></i>
                                            <span class="text-red">At least 8 characters length</span>
                                        </li>
                                        <li>
                                            <i class="ti ti-circle-x text-red"></i>
                                            <span class="text-red">At least 1 number (0...9)</span>
                                        </li>
                                        <li>
                                            <i class="ti ti-circle-x text-red"></i>
                                            <span class="text-red">At least 1 lowercase letter (a...z)</span>
                                        </li>
                                        <li>
                                            <i class="ti ti-circle-x text-red"></i>
                                            <span class="text-red">At least 1 special symbol (!...$)</span>
                                        </li>
                                        <li>
                                            <i class="ti ti-circle-x text-red"></i>
                                            <span class="text-red">At least 1 uppercase letter (A...Z)</span>
                                        </li>
                                    </ul>
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
        <script>
            const passwordInput = document.querySelector(".pass-field input");
            const confirmInput = document.querySelector(".confirm-field input");
            const requirementList = document.querySelectorAll(".requirement-list li");

            const passeye = document.querySelector(".pass-field i");
            const confirmeye = document.querySelector(".confirm-field i");
            // An array of password requirements with corresponding
            // regular expressions and index of the requirement list item
            // let passeye1 = document.querySelector(".pass-icon svg");
            const requirements = [{
                    regex: /.{8,}/,
                    index: 0
                }, // Minimum of 8 characters
                {
                    regex: /[0-9]/,
                    index: 1
                }, // At least one number
                {
                    regex: /[a-z]/,
                    index: 2
                }, // At least one lowercase letter
                {
                    regex: /[^A-Za-z0-9]/,
                    index: 3
                }, // At least one special character
                {
                    regex: /[A-Z]/,
                    index: 4
                }, // At least one uppercase letter
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
            passeye.addEventListener("click", function() {
                // console.log("clicked");
                // // Toggle the password input type between "password" and "text"
                passwordInput.type =
                    passwordInput.type === "password" ? "text" : "password";
                // Update the eye icon class based on the password input type
                passeye.className = `ti ti-eye${
                passwordInput.type === "text" ? "" : "-off"
            }`;
            });

            confirmeye.addEventListener("click", function() {
                // // Toggle the password input type between "password" and "text"
                confirmInput.type =
                    confirmInput.type === "password" ? "text" : "password";
                // Update the eye icon class based on the password input type
                confirmeye.className = `ti ti-eye${
                confirmInput.type === "text" ? "" : "-off"
            }`;
            });
        </script>
    @endpush

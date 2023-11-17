<div class="form-login" id="login-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="email" class="form-control" id="email" name="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remeber this Device
                </label>
            </div>
            <a class="text-primary fw-medium forgot-js">Forgot
                Password ?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
            {{ __('Login') }}
        </button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-medium">New to SIDIPA?</p>
            <a class="text-primary fw-medium ms-2 link-js">Create an account</a>
        </div>
    </form>
</div>
<div class="form-register non-active" id="register-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control @error('txtemail') is-invalid @enderror" id="txtemail"
                name="txtemail" value="{{ old('txtemail') }}" required autocomplete="email">
            @error('txtemail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="pass-field">
                <input type="password" class="form-control @error('txtpassword') is-invalid @enderror" id="txtpassword"
                    name="txtpassword" required autocomplete="new-password">
                <span class="pass-icon"><i class="ti ti-eye-off"></i></span>
                @error('txtpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <div class="confirm-field">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                        required autocomplete="new-password">
                    <span class="confirm-icon"><i class="ti ti-eye-off"></i></span>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                    {{ __('Login') }}
                </button>
                <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Already Have Account?</p>
                    <a class="text-primary fw-medium ms-2 link-js">Login</a>
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
<div class="form-forgot non-active" id="forgot-form">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <header class="mb-4">
                <h4 class="card-title">Atur Ulang Kata Sandi</h4>
            </header>
            <p>Masukkan e-mail yang terdaftar. Kami akan mengirimkan kode verifikasi untuk atur
                ulang kata sandi.</p>
            <input type="email" class="form-control @error('forgot-email') is-invalid @enderror" id="forgot-email"
                name="forgot-email" value="{{ old('forgot-email') }}" required autocomplete="forgot-email">
            @error('forgot-email')
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

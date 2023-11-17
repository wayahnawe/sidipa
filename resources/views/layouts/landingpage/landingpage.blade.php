<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--  Title -->
  <title>@yield('title')</title>
  <!--  Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset('landingpage/dist/images/logos/favicon.ico')}}">
  <!--  Aos -->
  <link rel="stylesheet" href="{{asset('landingpage/dist/libs/aos/dist/aos.css')}}">
  <link rel="stylesheet" href="{{asset('landingpage/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('landingpage/dist/css/style.min.css')}}">
</head>

<body>
  <div class="page-wrapper p-0 overflow-hidden">
    <header class="header">
        @include('layouts.landingpage.__content__.header')
    </header>
    <div class="body-wrapper overflow-hidden">
        @yield('content')
    </div>
    <footer class="footer-part pt-8 pb-5">
        @include('layouts.landingpage.__content__.footer')
    </footer>
    <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header p-4">
        <img src="{{asset('landingpage/dist/images/logos/logo-dark.svg')}}" alt="" class="img-fluid" width="150">
      </div>
      <div class="offcanvas-body p-4">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Demos <i class="ti ti-chevron-down fs-14"></i></a>
            <ul class="dropdown-menu ps-2">
              <li>
                <a class="dropdown-item text-dark" href="../package/html/dark/index.html">Dark</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="../package/html/horizontal/index.html">Horizontal</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="../package/html/main/index.html">LTR</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="../package/html/minisidebar/index.html">Minisidebar</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="../package/html/rtl/index.html">RTL</a>
              </li>
            </ul>
          </li>
          <li class="nav-item mt-3 dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Pages <i class="ti ti-chevron-down fs-14"></i></a>
            <div class="dropdown-menu mt-3 ps-1">
              <!-- apps -->
              <div class="row">
                <div class="col-12">
                  <div class="position-relative">
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-chat.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Chat Application</h6>
                        <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-invoice.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Invoice App</h6>
                        <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-mobile.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Contact Application</h6>
                        <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-message-box.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Email App</h6>
                        <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-12">
                  <div class="position-relative">
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-cart.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">User Profile</h6>
                        <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-date.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Calendar App</h6>
                        <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-lifebuoy.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Contact List Table</h6>
                        <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                      </div>
                    </a>
                    <a href="#" class="d-flex align-items-center pb-7 position-relative lh-base">
                      <div class="bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('landingpage/dist/images/svgs/icon-dd-application.svg')}}" alt="" class="img-fluid" width="24" height="24">
                      </div>
                      <div class="d-inline-block">
                        <h6 class="mb-1 fw-semibold text-hover-primary">Notes Application</h6>
                        <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-12">
                  <!-- quick links -->
                  <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                  <ul class="list-unstyled px-1">
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">Pricing Page</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">Authentication Design</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">Register Now</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">404 Error Page</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">Notes App</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">User Application</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="#">Account Settings</a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link fs-3 text-dark active" aria-current="page" href="../docs/index.html">Documentation</a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link fs-3 text-dark" href="#">Pages</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <a href="../package/html/main/authentication-login.html" class="btn btn-primary w-100 py-2">Login</a>
        </form>
      </div>
    </div>
  </div>
  <script src="{{asset('landingpage/dist/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('landingpage/dist/libs/aos/dist/aos.js')}}"></script>
  <script src="{{asset('landingpage/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landingpage/dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('landingpage/dist/js/custom.js')}}"></script>
</body>

</html>

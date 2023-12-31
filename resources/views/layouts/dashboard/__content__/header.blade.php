<header class="app-header" style="background: white">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="ti ti-search"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">DIPA Apps<span class="mt-1"><i
                            class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="row">
                        <div class="col-8">
                            <div class=" ps-7 pt-7">
                                <div class="border-bottom">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="position-relative">
                                                <a href="{{route('backend.perjalanan_dinas.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-chat-1.svg')}}"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Perjalanan Dinas
                                                        </h6>
                                                        <span class="fs-2 d-block text-dark">Pengajuan Perjalanan Dinas</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.sptjb.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-invoice-1.svg')}}"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">SPTJB</h6>
                                                        <span class="fs-2 d-block text-dark">Surat Pernyataan Tanggung Jawab Belanja</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.realisasi.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-mobile-1.svg')}}"
                                                          alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Realisasi Anggaran</h6>
                                                        <span class="fs-2 d-block text-dark">Realisasi vs Pagu</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.tarif.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-message-box-1.svg')}}"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Tarif</h6>
                                                        <span class="fs-2 d-block text-dark">Tarif Uang Harian Daerah / Negara</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="position-relative">
                                                <a href="{{route('backend.employee.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-cart-1.svg')}}"
                                                         alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Kepegawaian</h6>
                                                        <span class="fs-2 d-block text-dark">Daftar Pegawai</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.rekap_perjalanan.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-date-1.svg')}}"
                                                         alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Rekap Perjalanan</h6>
                                                        <span class="fs-2 d-block text-dark">Laporan Rekap Perjalanan</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.daftar_perjalanan.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-lifebuoy-1.svg')}}"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Daftar Perjalanan</h6>
                                                        <span class="fs-2 d-block text-dark">Laporan Daftar Perjalanan</span>
                                                    </div>
                                                </a>
                                                <a href="{{route('backend.jadwal_perjalanan.index')}}"
                                                    class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div
                                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('bootstrap/dist/images/svgs/icon-dd-application-1.svg')}}"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Jadwal Perjalanan</h6>
                                                        <span class="fs-2 d-block text-dark">Laporan Jadwal Perjalanan</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center py-3">
                                    <div class="col-8">
                                        <a class="fw-semibold text-dark d-flex align-items-center lh-1 text-decoration-none"
                                            href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked
                                            Questions</a>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end pe-4">
                                            <button class="btn btn-primary">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ms-n4">
                            <div class="position-relative p-7 border-start h-100">
                                <h5 class="fs-5 mb-9 fw-semibold">Core DIPA</h5>
                                <ul class="">
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.organisasi.index')}}">Organization Level</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.pejabat.index')}}">Jabatan</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.gtpd.index')}}">Golongan & TPD</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.maskapai.index')}}">Daftar Maskapai</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.expenses.index')}}">Kategori Biaya</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.ledger.index')}}">Buku Besar</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                            href="{{route('backend.pagu.index')}}">Pagu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link" href="{{route('backend.perjalanan_dinas.index')}}">Perjalanan Dinas</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link" href="{{route('backend.sptjb.index')}}">SPTJB</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link" href="{{route('backend.realisasi.index')}}">Realisasi</a>
            </li>
        </ul>
        <div class="d-block d-lg-none">
            <img src="{{asset('bootstrap/dist/images/logos/sidipa-logo.png')}}" width="200" alt="">
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)"
                    class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-primary rounded-circle"></div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                            </div>
                            <div class="message-body" data-simplebar="">
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-1-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-2-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">New message</h6>
                                        <span class="d-block">Salma sent you new message</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-3-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                        <span class="d-block">Check your earnings</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-4-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                        <span class="d-block">Assign her new tasks</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-5-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">John received payment</h6>
                                        <span class="d-block">$230 deducted from account</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{asset('bootstrap/dist/images/profile/user-1-1.jpg')}}" alt="use')}}r"
                                            class="rounded-circle" width="48" height="48">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                            </div>
                            <div class="py-6 px-7 mb-1">
                                <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{asset('bootstrap/dist/images/profile/user-1-1.jpg')}}" class="r')}}ounded-circle"
                                        width="35" height="35" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar="">
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{asset('bootstrap/dist/images/profile/user-1-1.jpg')}}" class="r')}}ounded-circle"
                                        width="80" height="80" alt="">
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                        <span class="mb-1 d-block text-dark">Designer</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> info@modernize.com
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('bootstrap/dist/images/svgs/icon-account-1.svg')}}" alt=""
                                                width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                            <span class="d-block text-dark">Account Settings</span>
                                        </div>
                                    </a>
                                    <a href="app-email.html" class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('bootstrap/dist/images/svgs/icon-inbox-1.svg')}}" alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                            <span class="d-block text-dark">Messages & Emails</span>
                                        </div>
                                    </a>
                                    <a href="app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('bootstrap/dist/images/svgs/icon-tasks-1.svg')}}" alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                                            <span class="d-block text-dark">To-do and Daily Tasks</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    {{-- <div
                                        class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">Unlimited Access</h5>
                                                <button class="btn btn-primary text-white">Upgrade</button>
                                            </div>
                                            <div class="col-6">
                                                <div class="m-n4">
                                                    <img src="{{asset('bootstrap/dist/images/backgrounds/unlimited-bg-1.png')}}"
                                                        alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('header-logout-form').submit();" class="btn btn-outline-primary">Log Out</a>
                                    <form id="header-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

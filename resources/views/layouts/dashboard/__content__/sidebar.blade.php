<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="index.html" class="text-nowrap logo-img">
            <img src="{{ asset('bootstrap/dist/images/logos/sidipa-logo.png') }}" class="dark-logo" width="210"
                alt="">
        </a>
        <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.dashboard') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">DIPA</span>
            </li>
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('backend.employee.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Kepegawaian</span>
                </a>
            </li> --}}
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow {{ (request()->is('adminpanel/employee/*')) || (request()->is('adminpanel/tarif/*')) ? 'active' : '' }}" href="#" aria-expanded="false">
                    <span class="d-flex">
                        <i class="ti ti-chart-donut-3"></i>
                    </span>
                    <span class="hide-menu">Core DIPA</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level {{ (request()->is('adminpanel/employee/*')) || (request()->is('adminpanel/tarif/*')) ? 'in' : '' }}">
                    <li class="sidebar-item">
                        <a href="{{route('backend.employee.index')}}" class="sidebar-link {{ (request()->is('adminpanel/employee/*')) ? 'active' : '' }}">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Data Kepegawaian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('backend.organisasi.index')}}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Organization Level</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('backend.pejabat.index')}}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Daftar Pejabat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('backend.gtpd.index')}}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Golongan & TPD</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('backend.tarif.index')}}" class="sidebar-link {{ (request()->is('adminpanel/tarif/*')) ? 'active' : '' }}">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Daerah & Tarif</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('backend.budget.index')}}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Budget DIPA</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a href="{{route('backend.expenses.index')}}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Kategori Biaya</span>
                        </a>
                    </li> --}}

                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('backend.perjalanan_dinas.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-map-2"></i>
                    </span>
                    <span class="hide-menu">Perjalanan Dinas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('backend.sptjb.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-mail"></i>
                    </span>
                    <span class="hide-menu">SPTJB</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('backend.realisasi.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-mail"></i>
                    </span>
                    <span class="hide-menu">Realisasi</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Laporan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.pagu.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-award"></i>
                        </span>
                        <span class="hide-menu">Pagu</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.ledger.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu">Buku Besar</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.rekap_perjalanan.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-map-pin"></i>
                        </span>
                        <span class="hide-menu">Rekap Perjalanan</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.daftar_perjalanan.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-location"></i>
                        </span>
                        <span class="hide-menu">Daftar Perjalanan</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('backend.jadwal_perjalanan.index')}}" aria-expanded="false">
                    <span class="d-flex">
                        <i class="ti ti-calendar-due"></i>
                    </span>
                    <span class="hide-menu">Jadwal Perjalanan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span class="d-flex">
                        <i class="ti ti-star"></i>
                    </span>
                    <span class="hide-menu">RAB Gabungan</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">User Management</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.users.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">User</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.roles.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu">Users Role</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.permissions.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">Users Permission</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between" href="{{route('backend.module.index')}}" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-settings"></i>
                        </span>
                        <span class="hide-menu">Module Management</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3" style="margin-bottom:50px">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ asset('bootstrap/dist/images/profile/user-1-1.jpg') }}" class="rounded-circle"
                        width="40" height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('side-bar-logout-form').submit();" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
                <form id="side-bar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- End Sidebar navigation -->
</div>

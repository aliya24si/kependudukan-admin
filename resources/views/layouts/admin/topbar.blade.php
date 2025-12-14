<div class="topbar">
    <nav class="navbar navbar-expand navbar-light bg-white" style="padding: 12px 20px; border-bottom: none !important;">

        <div class="container-fluid d-flex align-items-center justify-content-between">

            <!-- KIRI: TOGGLE (MOBILE) + JUDUL -->
            <div class="d-flex align-items-center gap-2">

                <!-- TOGGLE SIDEBAR (MOBILE ONLY) -->
                <button class="btn btn-outline-secondary d-md-none" onclick="toggleSidebar()" style="padding: 4px 10px;">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="navbar-brand mb-0 d-flex align-items-center">
                    <img src="{{ asset('assets-admin/images/logo/bina-desa-black.png') }}" alt="Logo" class="img-fluid"
                        style="height: 45px;">
                </a>

            </div>


            <!-- KANAN: LOGOUT -->
            <div class="d-flex align-items-center">
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" style="border-radius: 6px; padding: 6px 15px;">
                        <i class="fa fa-sign-out-alt me-1"></i>
                        <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>

        </div>
    </nav>
</div>

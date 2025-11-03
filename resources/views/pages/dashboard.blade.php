@extends('layouts.admin.app')

@section('content')
    <!-- Main Content Start -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <!-- Home -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-house-door-fill fs-4 text-light me-2"></i>
                            <a href="dashboard" class="nav-item nav-link active">Home</a>
                        </div>

                        <!-- Program Bantuan -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-box-seam fs-4 text-light me-2"></i>
                            <a href="programs" class="nav-item nav-link">Program Bantuan</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people-fill fs-4 text-light me-2"></i>
                            <a href="warga" class="nav-item nav-link">Data Warga</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle fs-4 text-light me-2"></i>
                            <a href="users" class="nav-item nav-link">Data User</a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-flex ms-auto align-items-center">
                    @if (session('user_name'))
                        <span class="text-green me-3">
                            Selamat datang, <strong>{{ session('user_name') }}</strong>!
                        </span>
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin mau logout?')"
                            class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <a href="https://wa.me/6282391906810" target="_blank" class="floating-whatsapp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3">bersama kita wujudkan kepedulian</h1>
                            <p class="fs-5 mb-5">Data yang transparan, bantuan yang tepat sasaran, dan harapan yang nyata
                                untuk masyarakat.</p>
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('assets-admin/img/carousel-1.jpeg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3">Sejahtera bagi sesama</h1>
                            <p class="fs-5 mb-5">
                                Pantau, kelola, dan salurkan bantuan sosial dengan mudah dan efisien.</p>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary py-3 px-4 me-3" href="users">Create Account</a>
                                <a class="btn btn-secondary py-3 px-4" href="warga">Join Us Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('assets-admin/img/carousel-2.jpeg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="about-img">
                        <img class="img-fluid w-100" src="{{ asset('assets-admin/img/about.jpg') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">Tugas Framework Bina Desa</h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">Tugas membuat web bina desa dengan tema Bantuan
                        Sosial.
                        Tentunya bantuan dari pemerintah, dengan tema template yang gaboleh sama dan database yang sudah
                        ditentukan.
                        Mencari template untuk dibuat sesuai dengan tema Bina Desa Bantuan Sosial.
                    </p>
                    <div class="row g-4 pt-2">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="h-100">
                                <h3>Our Mission</h3>
                                <p>Mengerjakan semua tugas sesuai arahan setiap pertemuan.</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>Tugas Selesai</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>Nilai Bagus</p>
                                <p class="text-dark mb-0"><i class="fa fa-check text-primary me-2"></i>Lulus Tepat
                                    Waktu</p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 bg-primary p-4 text-center">
                                <p class="fs-5 text-dark">Mengerjakan tugas butuh amunisi, jika berbaik hati mohon
                                    donasinya🙏🏻</p>
                                <a class="btn btn-secondary py-2 px-4" href="#!">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Main Content Start -->
@endsection

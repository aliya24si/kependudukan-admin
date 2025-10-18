<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-admin/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="index.html">
                    <h1 class="display-5 text-primary m-0">Bantuan Sosial</h1>
                </a>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-phone-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Call Us</h6>
                                <span class="text-white">+62 82391906810</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-envelope-open text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Mail Us</h6>
                                <span class="text-white">safwa24si@mahasiswa.pcr.ac.id</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-map-marker-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Address</h6>
                                <span class="text-white">Umban sari, Rumbai, Pekanbaru</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="dashboard" class="nav-item nav-link active">Home</a>
                        <a href="about" class="nav-item nav-link">About</a>
                        <a href="program" class="nav-item nav-link">Program</a>
                        <a href="warga" class="nav-item nav-link">Data Warga</a>

                        <!--
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="service" class="dropdown-item">Service</a>
                                <a href="donation" class="dropdown-item">Donation</a>
                                <a href="team" class="dropdown-item">Our Team</a>
                                <a href="testimonial" class="dropdown-item">Testimonial</a>
                                <a href="404" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        -->

                        <!-- <a href="contact" class="nav-item nav-link">Contact</a>-->
                    </div>
                    <div class="d-none d-lg-flex ms-auto">
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-4">BANTUAN SOSIAL PEMERINTAH</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Program</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Form tambah data -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">Tambah Program</div>
                <div class="card-body">
                    <form action="{{ route('event.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Nama Program</label>
                                <input type="text" name="nama_program" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Anggaran</label>
                                <input type="number" name="anggaran" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Media (dokumen/gambar)</label>
                            <input type="text" name="media" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- Tabel daftar program -->
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Data Program</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Program</th>
                                <th>Tahun</th>
                                <th>Anggaran</th>
                                <th>Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $program->kode }}</td>
                                    <td>{{ $program->nama_program }}</td>
                                    <td>{{ $program->tahun }}</td>
                                    <td>{{ number_format($program->anggaran, 2) }}</td>
                                    <td>{{ $program->media }}</td>
                                    <td>
                                        <a href="{{ route('event.edit', $program->program_id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('event.destroy', $program->program_id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Event End -->


            <!-- Banner Start -->
            <div class="container-fluid banner py-5">
                <div class="container">
                    <div class="banner-inner bg-light p-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 py-5 text-center">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="row g-5 py-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Our Office</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York,
                            USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-3">
                            <a class="btn btn-square btn-primary me-2" href="#!"><i
                                    class="fab fa-x-twitter"></i></a>
                            <a class="btn btn-square btn-primary me-2" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary me-2" href="#!"><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-primary me-2" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="#!">About Us</a>
                        <a class="btn btn-link" href="#!">Contact Us</a>
                        <a class="btn btn-link" href="#!">Our Services</a>
                        <a class="btn btn-link" href="#!">Terms & Condition</a>
                        <a class="btn btn-link" href="#!">Support</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Business Hours</h4>
                        <p class="mb-1">Monday - Friday</p>
                        <h6 class="text-light">09:00 am - 07:00 pm</h6>
                        <p class="mb-1">Saturday</p>
                        <h6 class="text-light">09:00 am - 12:00 pm</h6>
                        <p class="mb-1">Sunday</p>
                        <h6 class="text-light">Closed</h6>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Gallery</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="img/gallery-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright pt-5">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="fw-semi-bold" href="#!">Your Site Name</a>, All Right
                            Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                            <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                            <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                            Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML
                                Codex</a>.
                            Distributed
                            by
                            <a class="fw-semi-bold" href="https://themewagon.com">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets-admin/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/counterup/counterup.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>

</html>

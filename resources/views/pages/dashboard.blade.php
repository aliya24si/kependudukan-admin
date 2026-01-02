@extends('layouts.admin.app')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">

            <style>
                .mini-bar {
                    display: flex;
                    align-items: flex-end;
                    gap: 4px;
                    height: 38px;
                }

                .bar {
                    width: 6px;
                    background: rgba(255, 255, 255, 0.8);
                    border-radius: 2px;
                }

                .h1 {
                    height: 10px
                }

                .h2 {
                    height: 18px
                }

                .h3 {
                    height: 26px
                }

                .h4 {
                    height: 34px
                }

                <style>.counter_content .total_no {
                    margin-bottom: 8px !important;
                }

                .counter_content .head_couter {
                    margin-top: 6px !important;
                    display: block;
                }
            </style>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- HERO SECTION / WELCOME BANNER --}}
            <div class="row margin_bottom_30">
                <div class="col-md-12">
                    <div class="dark_bg full"
                        style="border-radius: 10px; overflow: hidden; position: relative; min-height: 300px;">
                        {{-- Background Image --}}
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('assets-admin/images/layout_img/bantuan1.jpeg') }}'); background-size: cover; background-position: center; opacity: 0.8;">
                        </div>

                        {{-- Overlay --}}
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 100%);">
                        </div>

                        <div class="row align-items-center" style="min-height: 300px; position: relative; z-index: 2;">
                            <div class="col-md-8 p-5">
                                <h1 style="color: white; font-size: 2.8rem; margin-bottom: 15px; font-weight: bold;">
                                    <strong>Bantuan Sosial</strong>
                                </h1>
                                <h3 style="color: white; font-size: 2rem; margin-bottom: 20px; line-height: 1.3;">
                                    Membangun Masa Depan<br>
                                    Bersama Masyarakat
                                </h3>
                                <p
                                    style="color: rgba(255,255,255,0.95); font-size: 1.2rem; line-height: 1.6; max-width: 600px;">
                                    Program bantuan sosial yang tepat sasaran untuk membantu masyarakat
                                    dalam memenuhi kebutuhan dasar dan meningkatkan kesejahteraan hidup.
                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div style="padding: 30px;">
                                    <div
                                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius: 15px; padding: 30px; border: 1px solid rgba(255,255,255,0.2);">
                                        <div style="margin-bottom: 15px; display: flex; justify-content: center;">
                                            <img src="/assets-admin/images/logo/logo-bina-desa-kecil.png" alt="Logo Bina Desa"
                                                style="height: 6rem; width: auto;">
                                        </div>
                                        <h4 style="color: white; margin: 0; font-weight: bold;">Sistem Bantuan Sosial</h4>
                                        <small style="color: rgba(255,255,255,0.9);">Terintegrasi & Terpercaya</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- statistik --}}
            <div class="row column1" style="margin-bottom:25px;">

                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section p-4"
                        style="background:#3498db;border-radius:10px;color:white;height:140px;margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;">
                        <div class="counter_content">
                            <p class="total_no mb-1" style="font-size:4rem;font-weight:700;color:white !important;">
                                {{ $total_programs ?? 0 }}
                            </p>
                            <p></p>
                            <p class="head_couter mb-0" style="color:white !important;">Total Program</p>
                        </div>
                        <div class="mini-bar">
                            <div class="bar h2"></div>
                            <div class="bar h4"></div>
                            <div class="bar h3"></div>
                            <div class="bar h1"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section p-4"
                        style="background:#00897b;border-radius:10px;color:white;height:140px;margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;">
                        <div class="counter_content" style="width:60%;">
                            <p class="total_no mb-1" style="font-size:1.7rem;font-weight:700;color:white !important;">
                                Rp <br>{{ number_format($total_anggaran ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="head_couter mb-0" style="color:white !important;">Total Anggaran</p>
                        </div>
                        <div class="mini-bar">
                            <div class="bar h1"></div>
                            <div class="bar h3"></div>
                            <div class="bar h4"></div>
                            <div class="bar h2"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section p-4"
                        style="background:#ffa726;border-radius:10px;color:white;height:140px;margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;">
                        <div class="counter_content">
                            <p class="total_no mb-1" style="font-size:4rem;font-weight:700;color:white !important;">
                                {{ $total_pendaftar ?? 0 }}
                            </p>
                            <p></p>
                            <p class="head_couter mb-0" style="color:white !important;">Total Pendaftar</p>
                        </div>
                        <div class="mini-bar">
                            <div class="bar h3"></div>
                            <div class="bar h1"></div>
                            <div class="bar h4"></div>
                            <div class="bar h2"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section p-4"
                        style="background:#ec407a;border-radius:10px;color:white;height:140px;margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;">
                        <div class="counter_content">
                            <p class="total_no mb-1" style="font-size:4rem;font-weight:700;color:white !important;">
                                {{ $total_penerima ?? 0 }}
                            </p>
                            <p></p>
                            <p class="head_couter mb-0" style="color:white !important;">Total Penerima</p>
                        </div>
                        <div class="mini-bar">
                            <div class="bar h2"></div>
                            <div class="bar h4"></div>
                            <div class="bar h3"></div>
                            <div class="bar h1"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row column3">

                {{-- list data --}}
                <div class="col-md-6">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Program Bantuan Terbaru</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr class="text-center" style="background-color: #f8f9fa;">
                                            <th colspan="2" class="text-start">Informasi Program</th>
                                            <th class="text-end">Anggaran</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($recent_programs as $index => $program)
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="width: 15%; vertical-align: middle;">
                                                    <div class="bg-primary text-white text-center rounded py-2 px-3">
                                                        <strong>{{ $program->kode }}</strong>
                                                    </div>
                                                </td>
                                                <td style="width: 60%; vertical-align: middle;">
                                                    <div>
                                                        <strong>{{ $program->nama_program }}</strong><br>
                                                        <small class="text-muted">Tahun: {{ $program->tahun }}</small>
                                                    </div>
                                                </td>
                                                <td style="width: 20%; vertical-align: middle;" class="text-end">
                                                    <div>
                                                        <strong class="text-success">Rp
                                                            {{ number_format($program->anggaran, 0, ',', '.') }}</strong>
                                                    </div>
                                                </td>
                                                <td style="width: 5%; vertical-align: middle;" class="text-end">
                                                    <a href="{{ route('programs.show', $program->program_id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4">
                                                    <i class="fa fa-box-open fa-2x text-muted mb-2"></i><br>
                                                    Belum ada data program
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center py-3" style="border-top: 1px solid #dee2e6;">
                                <a href="{{ route('programs.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-list"></i> Lihat Semua Program
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- slideshow --}}
                <div class="col-md-6">
                    <div class="dark_bg full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Dokumentasi</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    {{-- Slide 1 --}}
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="img-box mb-4" style="width: 220px; height: 220px;">
                                                <img src="{{ asset('assets-admin/images/layout_img/bantuan4.jpeg') }}"
                                                    alt="Testimonial 1"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <p class="testimonial text-center mb-3">"Alhamdulillah, bantuan ini sangat
                                                membantu keluarga kami dalam memenuhi kebutuhan sehari-hari."</p>
                                            <small class="text-muted">Penerima Bantuan Langsung Tunai</small>
                                        </div>
                                    </div>

                                    {{-- Slide 2 --}}
                                    <div class="carousel-item">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="img-box mb-4" style="width: 220px; height: 220px;">
                                                <img src="{{ asset('assets-admin/images/layout_img/bantuan3.jpeg') }}"
                                                    alt="Testimonial 2"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <p class="testimonial text-center mb-3">"Terima kasih atas bantuan yang
                                                diberikan. Sangat bermanfaat untuk kebutuhan pendidikan anak saya."</p>
                                            <small class="text-muted">Penerima Program Keluarga Harapan</small>
                                        </div>
                                    </div>

                                    {{-- Slide 3 --}}
                                    <div class="carousel-item">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="img-box mb-4" style="width: 220px; height: 220px;">
                                                <img src="{{ asset('assets-admin/images/layout_img/bantuan2.jpeg') }}"
                                                    alt="Testimonial 3"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <p class="testimonial text-center mb-3">"Dengan bantuan ini, saya bisa menambah
                                                modal usaha kecil-kecilan di rumah. Terima kasih banyak."</p>
                                            <small class="text-muted">Penerima Bantuan UMKM</small>
                                        </div>
                                    </div>
                                </div>

                                {{-- Carousel Controls --}}
                                <a class="carousel-control-prev" href="#testimonial_slider" role="button"
                                    data-slide="prev">
                                    <i class="fa fa-angle-left fa-2x"></i>
                                </a>
                                <a class="carousel-control-next" href="#testimonial_slider" role="button"
                                    data-slide="next">
                                    <i class="fa fa-angle-right fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- Profil Admin Guest --}}
                <div class="row column3">
                    <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2>Tim Pengembang Sistem</h2>
                                </div>
                            </div>
                            <div class="full graph_revenue">
                                <div class="row justify-content-center">
                                    @foreach ($pengembang as $dev)
                                        <div class="col-md-6 mb-4">
                                            <div class="card shadow-sm border-0"
                                                style="border-radius: 12px; overflow: hidden; border: 1px solid #e9ecef;">
                                                <div class="card-body p-4">
                                                    <div class="row align-items-start">
                                                        {{-- Bagian Foto --}}
                                                        <div class="col-md-4 text-center">
                                                            @if ($dev['foto'])
                                                                <div class="position-relative d-inline-block">
                                                                    <img src="{{ asset($dev['foto']) }}"
                                                                        class="img-fluid rounded-circle mb-3"
                                                                        style="width:140px;height:140px;object-fit:cover;border: 3px solid #dee2e6;">
                                                                </div>
                                                            @else
                                                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mb-3"
                                                                    style="width:140px;height:140px;">
                                                                    <i class="fa fa-user fa-3x text-white"></i>
                                                                </div>
                                                            @endif

                                                            {{-- Badge Role --}}
                                                            <div class="mt-2">
                                                                <span class="badge"
                                                                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 15px; border-radius: 20px;">
                                                                    <i class="fa fa-code me-1"></i> Developer
                                                                </span>
                                                            </div>
                                                        </div>

                                                        {{-- Bagian Info --}}
                                                        <div class="col-md-8" style="padding-left: 20px;">
                                                            {{-- Nama --}}
                                                            <h4 class="mb-2" style="font-weight: 600; color: #2c3e50;">
                                                                {{ $dev['nama'] }}</h4>

                                                            {{-- NIM & Prodi --}}
                                                            <div class="mb-3">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <i class="fa fa-id-card me-2"
                                                                        style="color: #3498db; width: 20px;"></i>
                                                                    <span style="color: #7f8c8d; font-size: 0.95rem;">
                                                                        {{ $dev['nim'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <i class="fa fa-graduation-cap me-2"
                                                                        style="color: #2ecc71; width: 20px;"></i>
                                                                    <span style="color: #7f8c8d; font-size: 0.95rem;">
                                                                        {{ $dev['prodi'] }}
                                                                    </span>
                                                                </div>
                                                                @if (isset($dev['lokasi']))
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        <i class="fa fa-map-marker me-2"
                                                                            style="color: #e74c3c; width: 20px;"></i>
                                                                        <span style="color: #7f8c8d; font-size: 0.95rem;">
                                                                            {{ $dev['lokasi'] }}
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            {{-- Divider --}}
                                                            <hr style="margin: 20px 0; border-color: #eee;">

                                                            {{-- Sosial Media --}}
                                                            <div class="social-icons">
                                                                <p class="mb-2"
                                                                    style="color: #95a5a6; font-size: 0.9rem;">Connect with
                                                                    me:</p>
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    @if ($dev['linkedin'])
                                                                        <a href="{{ $dev['linkedin'] }}" target="_blank"
                                                                            class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fab fa-linkedin"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($dev['github'])
                                                                        <a href="{{ $dev['github'] }}" target="_blank"
                                                                            class="btn btn-outline-dark btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fab fa-github"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($dev['instagram'])
                                                                        <a href="{{ $dev['instagram'] }}" target="_blank"
                                                                            class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fab fa-instagram"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($dev['youtube'])
                                                                        <a href="{{ $dev['youtube'] }}" target="_blank"
                                                                            class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fab fa-youtube"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($dev['wa'])
                                                                        <a href="https://wa.me/{{ $dev['wa'] }}"
                                                                            target="_blank"
                                                                            class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fab fa-whatsapp"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if ($dev['email'])
                                                                        <a href="mailto:{{ $dev['email'] }}"
                                                                            class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                            style="width: 36px; height: 36px; transition: all 0.3s;">
                                                                            <i class="fa fa-envelope"></i>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    @endsection

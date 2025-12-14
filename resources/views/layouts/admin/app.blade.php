<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- MOBILE META (WAJIB SATU SAJA) -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- site metas -->
    <title>Bantuan Sosial</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- site icon -->
    <link rel="icon" href="{{ asset('assets-admin/images/fevicon.png') }}" type="image/png" />

    <!-- css -->
    @include('layouts.admin.css')

    <!-- FIX RESPONSIVE -->
    <style>
        body {
            overflow-x: hidden;
        }

        /* ===== MOBILE FIX ===== */
        @media (max-width: 768px) {

            /* sembunyikan sidebar di HP */
            .sidebar {
                left: -280px !important;
            }

            /* munculkan saat toggle */
            .sidebar.show {
                left: 0 !important;
            }

            /* content full width */
            #content {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .inner_container,
            .full_container {
                padding-left: 0 !important;
            }
        }
    </style>
</head>

<body class="dashboard dashboard_2">

<div class="full_container">
    <div class="inner_container">

        <!-- SIDEBAR -->
        @include('layouts.admin.sidebar')
        <!-- END SIDEBAR -->

        <!-- CONTENT -->
        <div id="content">

            <!-- TOPBAR -->
            @include('layouts.admin.topbar')
            <!-- END TOPBAR -->

            <p></p>
            <!-- PAGE CONTENT -->
            <div class="container-fluid py-3">
                @yield('content')
            </div>

            <!-- FLOATING WHATSAPP -->
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20bertanya..."
               class="btn btn-success rounded-circle shadow d-flex align-items-center justify-content-center"
               target="_blank"
               title="Hubungi kami di WhatsApp"
               style="position: fixed; bottom: 20px; right: 20px; width: 56px; height: 56px; z-index: 1000;">
                <i class="fab fa-whatsapp fa-2x text-white"></i>
            </a>

            <!-- FOOTER -->
            @include('layouts.admin.footer')
            <!-- END FOOTER -->

        </div>
        <!-- END CONTENT -->

    </div>
</div>

<!-- JS -->
@include('layouts.admin.js')

<!-- TOGGLE SIDEBAR MOBILE -->
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show');
    }
</script>

</body>
</html>

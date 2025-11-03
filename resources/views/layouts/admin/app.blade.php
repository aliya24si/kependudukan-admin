<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- css -->
    @include('layouts.admin.css')
    <!-- css -->
</head>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('layouts.admin.sidebar')
            <!-- end sidebar -->

            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('layouts.admin.topbar')
                <!-- end topbar -->

                <!-- dashboard inner -->
                @yield('content')
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20bertanya..."
                    class="btn btn-success rounded-circle shadow d-flex align-items-center justify-content-center"
                    target="_blank" title="Hubungi kami di WhatsApp"
                    style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; z-index: 1000;">
                    <i class="fab fa-whatsapp fa-2x text-white"></i>
                </a>
                <!-- footer -->
                @include('layouts.admin.footer')
                <!-- footer -->

            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
    </div>

    <!-- js -->
    @include('layouts.admin.js')
    <!-- js -->
</body>

</html>

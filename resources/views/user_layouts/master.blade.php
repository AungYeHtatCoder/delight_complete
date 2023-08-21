@include('user_layouts.header')

<body>

    <!-- ======= Header ======= -->
    @include('user_layouts.nav')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @include('user_layouts.hero')
    <!-- End Hero -->

    <main id="main">

        @yield('content')

       
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('user_layouts.footer')
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('user_layouts.js')

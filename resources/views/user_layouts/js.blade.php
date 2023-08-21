<script src="{{ asset('user_app/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    {{-- <script src="./node_modules/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="./node_modules/@splidejs/splide-extension-auto-scroll/dist/js/splide-extension-auto-scroll.min.js"></script> --}}
    <script src="{{ asset('user_app/assets/vendor/splide-4.1.3/js/splide.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/vendor/splide-4.1.3/js/splide-extension-auto-scroll.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user_app/assets/js/main.js') }}"></script>

</body>

<script>
    const splide = new Splide('.splide', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        arrows: false,
        pagination: false,
        // pauseOnHover: true,
        autoWidth: true,
        perPage: 6,
        autoScroll: {
            speed: 2,
            pauseOnHover: false,
        }
    });
    splide.mount(window.splide.Extensions);
</script>

</html>

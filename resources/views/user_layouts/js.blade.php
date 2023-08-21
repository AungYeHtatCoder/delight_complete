
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


<script>
    function saveLogin() {
      var emailInput = document.getElementById("email");
      var passwordInput = document.getElementById("password");
      var rememberMeCheckbox = document.getElementById("rememberMe");

      if (rememberMeCheckbox.checked) {
        var email = emailInput.value.trim();
        var password = passwordInput.value.trim();

        // Save the login details in a cookie or local storage
        // Note: Here, we are using local storage as an example
        localStorage.setItem("rememberedEmail", email);
        localStorage.setItem("rememberedPassword", password);
      } else {
        // Clear the saved login details from the cookie or local storage
        localStorage.removeItem("rememberedEmail");
        localStorage.removeItem("rememberedPassword");
      }
    }

    function loadSavedLogin() {
      var emailInput = document.getElementById("email");
      var passwordInput = document.getElementById("password");
      var rememberMeCheckbox = document.getElementById("rememberMe");

      // Check if there are saved login details in the cookie or local storage
      var savedEmail = localStorage.getItem("rememberedEmail");
      var savedPassword = localStorage.getItem("rememberedPassword");

      if (savedEmail && savedPassword) {
        // Set the saved login details in the input fields
        emailInput.value = savedEmail;
        passwordInput.value = savedPassword;
        rememberMeCheckbox.checked = true;
      }
    }
</script>

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

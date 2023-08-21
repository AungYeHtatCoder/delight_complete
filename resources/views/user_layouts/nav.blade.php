<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="{{ url('/') }}" class="logo me-auto">
                <img src="{{ asset('user_app/assets/img/logo.png') }}" alt="" class="img-fluid">
                <span>Delight
          <small style="font-size:12px">
            Myanmar
          </small>
        </span>
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" id="home-nav" href="{{ url('/') }}">Home</a></li>
                <li><a class="nav-link scrollto" id="about-nav" href="{{ url('/about-us') }}">About</a></li>
                <li><a class="nav-link scrollto" id="service" href="{{ url('/our-services') }}">Services</a></li>
                <li><a class="nav-link scrollto" id="pricing" href="{{ url('/pricing') }}">Pricing</a></li>
                <!-- <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li> -->
                <li><a class="nav-link scrollto" id="team" href="{{ url('/our-teams') }}">Team</a></li>
                <li><a class="nav-link scrollto" id="client"  href="{{ url('/our-clients') }}"><span>Our Clients</span></a></li>
                <li><a class="nav-link scrollto" id="contact" href="{{ url('contact-us') }}">Contact</a></li>
                @guest
                <li><a class="getstarted scrollto" href="{{ url('/login') }}">Get Start</a></li>
                @endguest
                @auth
                <li>
                    <a href="{{ route('home') }}"><img src="{{ asset('user_app/assets/img/profile.png') }}" alt="profile">
                  </a>
                </li>
                @endauth

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future of IT & Digital Marketing</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    {{-- bootstrap css links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    @import url('https://fonts.cdnfonts.com/css/source-sans-pro');
    *{
        font-family: Source Sans Pro;
    }
    .logo-name{
        font-size: 22px;
        font-weight: 700;
        padding-bottom: 0;
        margin-bottom: 0;
        margin-top: 10px;
    }
    .sub-logo{
        font-size: 14px;
        letter-spacing: 3px;
    }
    .nav-item{
        letter-spacing: 1px;
        margin: 10px;
    }
</style>
</head>
<body>
{{-- navbar --}}
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <div class="d-flex">
            <div class="">
                <img src="{{ asset('assets/img/logo.png') }}" width="90px" alt="">
            </div>
            <div>
                <h4 class="logo-name">Delight Motion & Art</h4>
                <span class="sub-logo">Let's Make New Things</span>
            </div>
        </div>

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SERVICES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PACKAGES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">CONTACT</a>
          </li>
        </ul>
        <div class="pe-3">
            @guest
            <a href="{{ url('/login') }}" class="btn btn-outline-secondary"><i class="fas fa-lock me-2"></i>LOGIN</a>
            @endguest
            @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-secondary d-inline">
                    <i class="fas fa-right-from-bracket me-2"></i>
                    Logout
               </button>
            @endauth

        </div>
        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
</nav>
{{-- navbar --}}

@yield('content')

{{-- footer --}}
<footer class="bg-light">
    <p class="py-3 text-center bg-light">Copyright &copy; 2023, <a class="text-decoration-none" href="">Future of IT & Digital Markerting</a></p>
</footer>
{{-- footer --}}


    {{-- bootstrap js links --}}
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>

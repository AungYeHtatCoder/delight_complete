@extends('user_layouts.master')

@section('content')
<!-- ======= Header ======= -->
@include('user_layouts.other-nav')
<!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs ">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Contact</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    {{-- login section --}}
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>User Login</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{ url('/login') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                                @error('email')
                                <p class="text-danger">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')
                                <p class="text-danger">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <div>
                                        <input type="checkbox" name="" id="rememberMe" >
                                        <label for="rememberMe" class="form-label rememberMe">Remember Me</label>
                                    </div>
                                </div>
                                {{-- <div>
                                    @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-dark" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div> --}}
                            </div>

                            {{-- <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!
                                </div>
                            </div> --}}
                            <div class="text-center col-md-12">
                                <div class="row">
                                    <button type="submit" onclick="saveLogin()">Sign In</button>
                                    {{-- <span>Not already have an account?</span> ‌
                                    <a href="contact.html">Register Here!</a> --}}
                                </div>
                            </div>
                    </form>
                    </div>

                </div>

            </div>
    </section>

@endsection


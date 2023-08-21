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
                <li>Services</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>လူကြီးမင်းတို စီးပွားရေးလုပ်ငန်းများ တိုးတက်အောင်မြင်ရန်အတွက် plan များထဲတွင်ပါဝင်တဲ့ service နမူနာလေးများ လေ့လာလိုရပါသည်.</p>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-movie-play"></i></div>
                        <h4><a href="{{ url('/service-samples/motion_video') }}">Motion Video</a></h4>
                        <p>လူကြီးမင်းတိုစီးပွားရေးလုပ်ငန်းအကြောင်း စိတ်ဝင်စားမှုအမြင့်ဆုံးလုပ်ဆောင်ပေးမည့် Video လေးများ</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-photo-album"></i></div>
                        <h4><a href="{{ url('/service-samples/art_photo') }}">Art Photo & Comic</a></h4>
                        <p> လူကြီးမင်းတို Page အား Reach ရောက်အားမြှင့်တင်ပေးသွားမည့်ဟာသ comic art လေးများဖြစ်ပါတယ်</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="{{ url('/service-samples/graphic') }}">Graphic Photo</a></h4>
                        <p>မြင်လိုက်တာနဲ့ ကျော်မသွားနိုင်အောင် စွဲဆောင်ပေးပြီး လူကြီးမင်းတို Product ကို ဖော်ပြပေးနိုင်မည့် ပုံအလန်းစားလေးများ.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-edit-alt"></i></div>
                        <h4><a href="{{ url('/service-samples/content/') }}">Content</a></h4>
                        <p>ထိထိမိမိလုပ်ဆောင်ပေးသွားမည့် Media buying.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Services Section -->

    <section class="section pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-sm-12 col-md-6 mb-5 mb-lg-0">
                    <img src="{{ asset('user_app/assets/img/services/services.png') }}" alt="feature bg" class="img-fluid">
                </div>

                <div class="col-lg-7 pl-4">
                    <div class="mb-5">
                        <h3 class="mb-4">We are making beautiful <br>design layout business site</h3>
                        <p>We craft beautiful website layout from scratch.You need not to worry about site design and other technial issue.We provide these attractive service as a bonus.Let's have atalk together for your next project.</p>
                    </div>

                    <ul class="about-list">
                        <li>
                            <h5 class="mb-2">Responsive site</h5>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.</p>
                        </li>

                        <li>
                            <h5 class="mb-2">Latest bootstrap 4</h5>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.</p>
                        </li>

                        <li>
                            <h5 class="mb-2">Modern design</h5>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.</p>
                        </li>
                        <li>
                            <h5 class="mb-2">Working contact form</h5>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <hr style="width: 85%; margin: auto;" />
@endsection


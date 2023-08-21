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
                <li>Samples</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

<!-- ======= Photo Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>{{ $service->service_name }}</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
      </div>

      <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-video">Motion Video</li>
      </ul>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($samples as $sample)
        <div class="col-lg-4 col-md-6 portfolio-item filter-video">
            <div class="portfolio-video">
              <video class="plyr" controls>
                <source src="{{ asset('user_app/assets/video/video-1.mp4') }}" type="video/mp4" />
              </video>
            </div>
        </div>
        @endforeach


        <div class="col-lg-4 col-md-6 portfolio-item filter-video">
          <div class="portfolio-video">
            <video class="plyr" controls>
              <source src="{{ asset('user_app/assets/video/video-2.mp4') }}" type="video/mp4" />
            </video>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-video">
          <div class="portfolio-video">
            <video class="plyr" controls>
              <source src="{{ asset('user_app/assets/video/video-3.mp4') }}" type="video/mp4" />
            </video>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-video">
          <div class="portfolio-video">
            <video class="plyr" controls>
              <source src="{{ asset('user_app/assets/video/video-4.mp4') }}" type="video/mp4" />
            </video>
          </div>
        </div>
      </div>

    </div>

    </div>
</section>
<!-- End Portfolio Section -->

@endsection

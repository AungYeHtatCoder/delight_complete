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
                <li>Client</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi
                    quidem hic quas.</p>
            </div>

            <div class="row my-3">
                @foreach ($clients as $client)
                <div class="col-lg-2 col-md-3 col-sm-6 logo">
                    <img src="{{ asset('uploads/'.$client->logo) }}" alt="">
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Clients Section -->
    <hr style="width: 85%; margin: auto;" />
@endsection


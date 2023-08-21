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
                <li>Pricing</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pricing</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur.</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-sm-10 pricing_design mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="single-pricing">
                        <h3>Budget</h3>
                        <!-- <h4><sup>$</sup>0<span>per month</span></h4> -->
                        <hr style="width: 90%; height: 2px;" />
                        <ul>
                            @foreach ($budget->services as $service)
                                @if ($service->service_name !== "Content" && $service->service_name !== "Boosting")
                                    <li>
                                        <a href="">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="bx bx-check"></i> {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 45px;">{{ $service->pivot->qty }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <hr />
                                    </li>
                                @else
                                    <div class="mb-3">
                                        <h5 class="text-dark">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 90px;">
                                                        {{ $service->pivot->qty }}
                                                        {{ $service->service_name === "Boosting" ? "$" : "" }}
                                                    </span>
                                                </div>
                                            </div>
                                        </h5>
                                        <br />
                                    </div>
                                @endif
                            @endforeach
                        </ul>

                        <a href="#" class="buy-btn" title="Buy Now">{{ number_format($budget->price)  }} MMK</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-10 pricing_design mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="single-pricing">
                        <h3>Advance</h3>
                        <!-- <h4><sup>$</sup>0<span>per month</span></h4> -->
                        <hr style="width: 90%; height: 2px;" />
                        <ul>
                            @foreach ($advance->services as $service)
                                @if ($service->service_name !== "Content" && $service->service_name !== "Boosting")
                                    <li>
                                        <a href="">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="bx bx-check"></i> {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 45px;">{{ $service->pivot->qty }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <hr />
                                    </li>
                                @else
                                    <div class="mb-3">
                                        <h5 class="text-dark">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 90px;">
                                                        {{ $service->pivot->qty }}
                                                        {{ $service->service_name === "Boosting" ? "$" : "" }}
                                                    </span>
                                                </div>
                                            </div>
                                        </h5>
                                        <br />
                                    </div>
                                @endif
                            @endforeach
                        </ul>

                        <a href="#" class="buy-btn" title="Buy Now">{{ number_format($advance->price)  }} MMK</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-10 pricing_design mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="single-pricing">
                        <h3>Smart</h3>
                        <!-- <h4><sup>$</sup>0<span>per month</span></h4> -->
                        <hr style="width: 90%; height: 2px;" />
                        <ul>
                            @foreach ($smart->services as $service)
                                @if ($service->service_name !== "Content" && $service->service_name !== "Boosting")
                                    <li>
                                        <a href="">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="bx bx-check"></i> {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 45px;">{{ $service->pivot->qty }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <hr />
                                    </li>
                                @else
                                    <div class="mb-3">
                                        <h5 class="text-dark">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    {{ $service->service_name }}
                                                </div>
                                                <div class="pe-3">
                                                    <span style="margin-left: 90px;">
                                                        {{ $service->pivot->qty }}
                                                        {{ $service->service_name === "Boosting" ? "$" : "" }}
                                                    </span>
                                                </div>
                                            </div>
                                        </h5>
                                        <br />
                                    </div>
                                @endif
                            @endforeach
                        </ul>

                        <a href="#" class="buy-btn" title="Buy Now">{{ number_format($smart->price)  }} MMK</a>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
    <!-- End Pricing Section -->
@endsection


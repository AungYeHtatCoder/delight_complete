<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pricing</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur.</p>
        </div>

        <div class="row">

            <div class="col-lg-4 pricing_design" data-aos="fade-up" data-aos-delay="100">
                <div class="single-pricing">
                    <h3>Budget Plan</h3>
                    <h4 class="ps-5"><sup>Ks</sup>{{ number_format($budget->price) }}<span>per month</span></h4>
                    <hr style="width: 95%; height: 2px;" />
                    <ul>
                        @foreach ($budget->services as $service)
                        <li><i class="bx bx-check"></i> {{ $service->service_name }} ({{ $service->pivot->qty }}{{ $service->service_name == "Boosting" ? "$" : "" }})</li>
                        @endforeach
                    </ul>
                    <a href="register.html" class="buy-btn" title="Buy Now">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0 pricing_design" data-aos="fade-up" data-aos-delay="200">
                <div class="single-pricing">
                    <!-- class="featured" -->
                    <h3>Advance Plan</h3>
                    <h4 class="ps-5"><sup>Ks</sup>{{ number_format($advance->price) }}<span>per month</span></h4>
                    <hr style="width: 95%; height: 2px;" />
                    <ul>
                        @foreach ($advance->services as $service)
                        <li><i class="bx bx-check"></i> {{ $service->service_name }} ({{ $service->pivot->qty }}{{ $service->service_name == "Boosting" ? "$" : "" }})</li>
                        @endforeach
                    </ul>
                    <a href="register.html" class="buy-btn">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0 pricing_design" data-aos="fade-up" data-aos-delay="300">
                <div class="single-pricing">
                    <h3>Smart Plan</h3>
                    <h4 class="ps-5"><sup>Ks</sup>{{ number_format($smart->price) }}<span>per month</span></h4>
                    <hr style="width: 95%; height: 2px;" />
                    <ul>
                        @foreach ($smart->services as $service)
                        <li><i class="bx bx-check"></i> {{ $service->service_name }} ({{ $service->pivot->qty }}{{ $service->service_name == "Boosting" ? "$" : "" }})</li>
                        @endforeach
                    </ul>
                    <a href="register.html" class="buy-btn">Get Started</a>
                </div>
            </div>

        </div>

    </div>
</section>

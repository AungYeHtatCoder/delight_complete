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

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
            <p>အကောင်းမွန်ဆုံးနှင့် အထိရောက်ဆုံးသာမက အာမခံမှုအပြည့်ဖြင့် ဝန်ဆောင်မှုပေးနေတဲ့ Delight myanmar ကို ယခုပဲဆက်သွယ်လိုက်ပါ။</p>
            @if(Session::has('success'))
                <div class="text-success sent-message py-4">Your message has been sent. Thank you!</div>
            @endif
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Mandalay,Myanmar</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>dsgndelight@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>+95 09774250245</p>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0"
                        style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <div class="php-email-form">

                    <form action="{{ url('/sendMail') }}" method="post" role="form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" >
                                @error('name')
                                <p class="text-danger">*{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" >
                                @error('email')
                                <p class="text-danger">*{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" >
                            @error('subject')
                            <p class="text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="10" ></textarea>
                            @error('message')
                            <p class="text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>


            </div>

        </div>

    </div>
</section>
<!-- End Contact Section -->

<hr style="width: 85%; margin: auto;" />

@endsection


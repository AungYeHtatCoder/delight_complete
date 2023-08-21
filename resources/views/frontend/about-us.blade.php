@extends('user_layouts.master')

@section('content')
<!-- ======= Header ======= -->
@include('user_layouts.other-nav')
<!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>About</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12 col-md-8 mb-4 ">
                    <!-- <h3 class="mb-3">We’re Innovators & <br>SEO Marketing Agency</h3> -->
                    <p class="mb-4"><span style="font-weight: 700;">Delight Myanmar Company Team</span>က ဘယ်လိုမျိုးပုံစံနဲ့ service ပေးလည်း? </p>

                    <!-- <span class="h5 mb-4">Let's Check what we do actually :</span> -->
                    <ol class="about-list2 my-4" type="1">
                        <li class="mb-2">Service ပေးရန် Team group ဖွဲ့ခြင်း၊
                            လူကြီးမင်းတို့ service အပ်ပြီဆိုသည်နှင့်
                            Assistant Manager /AE /  Content writter / Graphic Designer / Motion Designer / Artist  / Customer service တို့နှင့် Team လေးတစ်ခု Messenger or viber မှာ Gp လေးလုပ်ဆောင်လိုက်ပါတယ်.</li>

                        <li class="mb-2">
                            service Fees ကောက်ခံခြင်း၊
                            လူကြီးမင်းတို့ ကျသင့်ငွေအား နှစ်သက်ရာ Banking ဖြင့် ပေးချေနိုင်ပါသည်.
                        </li>

                        <li class="mb-2">
                            Content Calender နှင့်အတူ Meeting လုပ်ခြင်း.
                            ၃ရက်ကြာတဲ့အခါမှာတော့ လူကြီးမင်းတို့အား Delight team ဘက်မှ service ပေးရန် Content calender acc နှင့်အတူ meeting လုပ်ပေးပြီး အကြောင်းအရာများအား ညှိနှိုင်းဆွေးနွေးပေးပါမည်.
                        </li>

                        <li class="mb-2">
                             ကလေး လူကြီး ကအစ မြင်လိုက်တာနဲ့ ကျော်မသွားစေမည့် Art comic ဟာသအတို အလန်းလေးများ
                        </li>

                        <li class="mb-2">
                             Reach ထိမိပြီး ရောင်းအားထိုးဖောက်နိုင်စေမည့် Boost service .
                        </li>

                        <li class="mb-2">
                             Brand တစ်ခုအတွက်မရှိမဖြစ်လိုအပ်တဲ့ website အလန်းစားများ အား တစ်နေရာထဲမှာ one stop / non stop service ပေးနေတဲ့ company တစ်ခုပဲဖြစ်ပါတယ်
                        </li>
                    </ol>

                    <a href="team.html" class="mt-3 d-inline-block">Learn more about us &gt;&gt;</a>
                </div>

                <div class="col-lg-6 col-md-4 ">
                    <img src="{{ asset('user_app/assets/img/about/about-4.jpg') }}" alt="" class="img-fluid w-90">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <hr style="width: 85%; margin: auto;" />
@endsection


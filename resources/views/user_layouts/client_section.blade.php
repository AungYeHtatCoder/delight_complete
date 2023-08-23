<section id="clients" class="clients section-bg splide" aria-label="Splide Basic HTML Example">
 <div class="container splide__track">
  <ul class="splide__list d-flex" data-aos="zoom-in">
   @foreach ($clients as $client)
   <li class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center splide__slide">
    <img src="{{ asset('uploads/'.$client->logo) }}" class="img-fluid" alt="Client 1">
   </li>
   @endforeach
  </ul>
 </div>
</section>
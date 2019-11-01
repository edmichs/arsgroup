@extends('layouts.template')


@section('content')
<section class="showcase mt-5">
    <div class="container-fluid p-0">
        <div class="row no-gutters pb-xl-5">
            <div class="col-lg-6 text-white showcase-img " style="background-image: url('img/crop-img-left.png');"></div>
            <div class="col-lg-6 my-auto showcase-text text-center">
              <i class=" mb-5 fa fa-search text" style="font-size: 7rem; color: #FB0000;  "></i>
              <h2 style="color: #FB0000;">Updated For Bootstrap 4</h2>
              <p class="lead mb-0 ">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
            </div>

          </div>
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/img-rigth.png');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text text-center">
            <i class=" mb-5 fa fa-search text" style="font-size: 7rem;   "></i>
          <h2 class="text" style="color: #FB0000;">Fully Responsive Design</h2>
          <p class="lead mb-0">When you  a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it&apos;s a phone, tablet, or desktop the page will behave responsively!</p>
        </div>
      </div>

    </div>
  </section>

  <section class="testimonials text-center ">
      <div class="container">
        <h2 class="mb-5">Nos Realisations</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <h1 class="text" style="color: #FB0000;">456</h1>
              <h5>CMS</h5>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <h1 class="text" style="color: #FB0000;">189</h1>
             <h5>Framework</h5>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <h1 class="text" style="color: #FB0000;">273</h1>
              <h5>Mobile</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=" text-center ">
        <div class="container">
          <h2 class="mb-5">Nos Partenaires</h2>
          <div class="row">
            <div class="col-md-3">

                  <img class=" " src="img/QLIK_GREY.png" alt="">
            </div>
            <div class="col-md-3">

                  <img class=" " src="img/empruntis-gris-1024x387.png" alt="">
            </div>
            <div class="col-md-3">

                  <img class=" " src="img/Colibri-New-Grey_0.png" alt="">
            </div>
            <div class="col-md-3">
                    <img class=" " src="img/images.png" alt="">
              </div>

          </div>
        </div>
      </section>

      <section class="call-to-action text-white ">
          <div class="overlay"></div>
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 h-100 ">
                    <h3>Nous contacter</h3>
                    <h4>Telephone :</h4>
                    <h4>Email :</h4>
                    <h4>Adresse :</h4>
                  </div>
                  <div class="col-lg-6 h-100 ">
                      <form action="">
                        <div class="col-12">

                        </div>

                      </form>
                  </div>

                </div>
          </div>
        </section>
@endsection

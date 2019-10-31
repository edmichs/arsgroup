<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
      
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
          text {
            color: #FB0000;
          }
        </style>
    </head>
    <body >
            <!-- Navigation -->
            <nav class="navbar navbar-light bg-light ">
              <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('img/ARS-4-1024x158.png') }}" alt="Logo" width="100px" srcset=""></a>
                <div class="text-right">
       
                  <a class=" align-right btn btn-light" href="#">Acceuil</a>
                  <a class="align-right btn btn-light" href="#">Mes devis</a>
                  <a class="align-right btn btn-light" href="#">Mes projets</a>
                  <a href="" class="btn btn-light">Mes Realisations</a>
                </div>
              </div>
             
            </nav>
          
            <!-- Masthead -->
            <header class="masthead text-white text-center">
              <div class="overlay"></div>
              <div class="container">
                <div class="row">
                  <div class="col-xl-9 mx-auto">
                    <h3 class="">Faites vos devis chez nous </h3><small >Nous vous accompagnons durant tout le processus</small>
                   
                  </div>
                  <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                      <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4 mt-5">
                          <button type="submit" class="btn btn-block btn-lg btn-danger">Commencez</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </header>
           
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
       </div>

       @include('Inc.footer')

       <!-- Bootstrap core JavaScript -->
       <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
       <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     
    </body>
</html>

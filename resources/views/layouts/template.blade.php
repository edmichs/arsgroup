<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('js/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
                .btn-light {
                    color: #000;
                    background-color: #FFF;
                    border-color: #FB0000
                }

                .btn-light:hover {
                    color: #fff;
                    background-color: #FB0000;
                    border-color: #dae0e5
                }

                .btn-light.focus,
                .btn-light:focus {
                    box-shadow: 0 0 0 .2rem rgba(216, 217, 219, .5)
                }

        </style>
        @yield('css')
    </head>
    <body >
           @include('Inc.header')

           @yield('content')
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
           @include('Inc.footer')

       <!-- Bootstrap core JavaScript -->
       <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
       <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('js')
    </body>
</html>

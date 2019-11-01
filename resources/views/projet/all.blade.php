@extends('layouts.template')

@section('css')
    <style>
.showcase{
    background-image: url(../img/WhatsApp-Image-2019-08-14-at-08-1024x568=.png;
}
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
@endsection

@section('content')
<header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
              <h3 class="">Mes Projets</h3>

            </div>

          </div>
        </div>
</header>

<section class="testomonials mt-5 mb-3">
        <div class="container-fluid">
            <div class="row text-center">
                    <div class="col-lg-4">
                            <a href="{{ route('projet_add_path') }}" class="btn btn-light"> <i class="fa fa-plus"></i> Nouveau Projet</a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ route('projet_path') }}" class="btn btn-danger">Projet En cours</a>
                     </div>
                    <div class="col-lg-4">
                        <a href="" class="btn btn-light">Projet Traité</a>

                  </div>
            </div>
        </div>

    </section>
<section class="showcase mb-5" >
    <div class="container ">

    </div>
</section>
@endsection

@section('js')

@endsection

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
                        <a href="{{ route('projet_add_path') }}" class="btn btn-danger"> <i class="fa fa-plus"></i> Nouveau Projet</a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('projet_path') }}" class="btn btn-light">Projet En cours</a>
                 </div>
                <div class="col-lg-4">
                    <a href="" class="btn btn-light">Projet Traité</a>

              </div>
        </div>
    </div>

</section>
<section class="showcase mb-5" >
    <div class="container ">
        <form action="{{ route('projet_add_path') }}" method="post">
            @csrf
            <div class="row ">
                <div class="col-12">
                    <div class="col-lg-6" style="float: left">

                        <div class=" form-group mt-2 mb-2">
                            <input type="text" name="contact_name" id="contact_name" class="form-control " placeholder="Nom du contact"  >
                            @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" form-group mt-2 mb-2">
                            <input type="text" name="name" id="name" class="form-control " placeholder="Nom du projet"  >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                        <div class=" form-group  pr-5 mt-2 mb-2" style="float: left">

                            <input type="numer" name="delai" id="" class="form-control " placeholder="Durée (en Jours)"  >
                            @error('delai')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                        <div class= "form-group  mt-2 mb-2" style="float: right">
                                <input type="date" name="start_date" id="start_date" class="form-control " placeholder="Nom"  >
                                @error('start_date')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                        <div class= "form-group  mt-2 mb-2">
                                <input type="email" name="email" id="email" class="form-control " placeholder="Email"  >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                  @enderror
                        </div>
                    </div>
                    <div class=" col-md-6 col-lg-6" style="float: right">
                            <div class="custom-file" id="customFile" lang="es">
                                    <input type="file" class="custom-file-input"  name="logo" id="exampleInputFile" aria-describedby="fileHelp">
                                    <label class="custom-file-label" for="exampleInputFile">
                                       Uploader le logo...
                                    </label>
                            </div>

                            <div class="form-group mt-2 mb-2 custom-file" id="customFile1" lang="es">
                                    <input type="file" class="custom-file-input"  name="work_book" id="exampleInputFile" aria-describedby="fileHelp">
                                    <label class="custom-file-label" for="exampleInputFile">
                                       Uploader le cahier de charge...
                                    </label>
                            </div>
                            <div class=" form-inline mt-2 mb-2" style="float: left">
                                    <input type="number" name="price" class="form-control " placeholder="Budget"  >
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class=" form-group mt-2 mb-2" style="float: right" >
                                <input type="tel" name="telephone" class="form-control " placeholder="téléphone"  >
                                @error('telephone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                            </div>
                    </div>

                </div>
                <div class="col-12 col-lg-12 form-group text-center" >
                    <textarea name="simple_description" id="" cols="120" rows="10" placeholder=" description du projet "></textarea>
                    @error('simple_decription')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-danger ">Envoyer</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')

@endsection

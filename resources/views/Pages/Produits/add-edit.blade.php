@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Produis</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE TITLE -->
<div class="page-title">
    <button type="button" class="btn btn-success mb-control" data-box="#message-box-success"><span
                class="fa fa-plus"></span>Nouvelle Categorie
    </button>
    <button type="button" class="btn btn-info mb-control" data-box="#message-box-info"><span class="fa fa-plus"></span>
        Nouvelle Sous Categorie
    </button>

</div>
<!-- END PAGE TITLE -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <form action="{{route('article_add_path')}}" id="jvalidate" method="post"  role="form"  class="form-horizontal">
            {{ csrf_field() }}
            @if(session('message'))
                <div class="row">
                    <div class="alert alert-warning">{{session('message')}}</div>
                </div>
            @endif
            <div class="col-md-12">


                <div class="form-group col-md-4">
                    <label>Sous cat&eacute;gorie</label>
                    <select name="produit_id" id="produit_id" class="form-control">
                        @foreach($produits as $produit)
                            <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control">

                </div>

                <div class="form-group col-md-8">
                    <label>Caracteristiques</label>
                    <input name="caracteristiques" id="caracteristiques" type="text" class="form-control"/>
                </div>

                <div class="form-group  col-md-4">
                    <label>Prix d&apos;achat</label>
                    <input type="number" name="prix_achat" id="prix_achat" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Quantit&eacute; initial</label>
                    <input type="number" name="quantite_initial" id="quantite_initial" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Fournisseur</label>
                    <select name="fournisseur_id" id="fournisseur_id" class="form-control">
                        @foreach($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
            <div class="col-md-4"></div>
        </form>

    </div>

</div>
<!-- success -->
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <form action="{{route('categorie_add_path')}}" method="post" id="form" role="form"  class="form-horizontal">
                {{ csrf_field() }}

                <div class="mb-title"><span class="fa fa-check"></span> Nouvelle  categorie</div>
                <div class="mb-content">
                    <div class="col-md-12">

                        <div class="form-group col-md-6">
                            <label>Code</label>
                            <input type="text" name="code" id="code" placeholder="Ex: 1200" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Libelle</label>
                            <input type="text" name="libelle" id="libelle" placeholder=" Ex : ElectroMenager" class="form-control">

                        </div>


                    </div>
                </div>
                <div class="mb-footer">
                    <button class="btn btn-default btn-lg pull-left " type="submit">Valider</button>
                    <button class="btn btn-danger btn-lg pull-left mb-control-close">Annuler</button>

                </div>

            </form>

        </div>
    </div>
</div>
<!-- end success -->
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->


<!-- info -->
<div class="message-box message-box-info animated fadeIn" id="message-box-info">
    <div class="mb-container">
        <div class="mb-middle">
            <form action="{{route('produit_add_path')}}" method="post"  role="form"  class="form-horizontal">
                {{ csrf_field() }}

                <div class="mb-title"><span class="fa fa-check"></span> Nouvelle  categorie</div>
                <div class="mb-content">
                    <div class="col-md-12">

                        <div class="form-group col-md-6">
                            <label>Code</label>
                            <input type="text" name="code" id="code" placeholder="Ex: 1235" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Libelle</label>
                            <input type="text" name="libelle" id="libelle" placeholder=" Ex : Ordinateurs" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorie</label>

                            <select name="categorie_id" class="form-control" id="categorie_id">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
                <div class="mb-footer">
                    <button class="btn btn-default btn-lg pull-left" type="submit">Valider</button>
                    <button class="btn btn-danger btn-lg pull-left mb-control-close">Annuler</button>

                </div>

            </form>
        </div>
    </div>
</div>
<!-- end info -->
@endsection
@section('js')
    <script type="text/javascript"
            src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

    <script type='text/javascript' src='{{asset('js/plugins/noty/jquery.noty.js')}}'></script>
    <script type='text/javascript' src='{{asset('js/plugins/noty/layouts/topCenter.js')}}'></script>
    <script type='text/javascript' src='{{asset('js/plugins/noty/layouts/topLeft.js')}}'></script>
    <script type='text/javascript' src='{{asset('js/plugins/noty/layouts/topRight.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/noty/themes/default.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/icheck/icheck.min.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}'></script>
    <script type='text/javascript' src='{{asset('js/plugins/bootstrap/bootstrap-select.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/validationengine/languages/jquery.validationEngine-en.js')}}'></script>
    <script type='text/javascript' src='{{asset('js/plugins/validationengine/jquery.validationEngine.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/jquery-validation/jquery.validate.js')}}'></script>

    <script type='text/javascript' src='{{asset('js/plugins/maskedinput/jquery.maskedinput.min.js')}}'></script>
    <script type="text/javascript">
        function notyConfirm() {
            noty({
                text: 'Do you want to continue?',
                layout: 'topRight',
                buttons: [
                    {
                        addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function ($noty) {
                        $noty.close();
                        noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                    }
                    },
                    {
                        addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function ($noty) {
                        $noty.close();
                        noty({text: 'You clicked "Cancel" button', layout: 'topRight', type: 'error'});
                    }
                    }
                ]
            })
        }
    </script>
    <script type="text/javascript">
        var jvalidate = $("#jvalidate").validate({
            ignore: [],
            rules: {
                categorie_id: {
                    required: true,
                },
                produit_id: {
                    required: true,
                },
                nom: {
                    required: true,
                },
                caracteristiques: {
                    required: true,
                    minlength: 10,
                },
                quantite_initial: {
                    required: true,
                },
                prix_achat: {
                    required: true,
                },
                fournisseur_id: {
                    required: true,
                }
            }
        });

    </script>
    <!-- END PAGE PLUGINS -->
@endsection
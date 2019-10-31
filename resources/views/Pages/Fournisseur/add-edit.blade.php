@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Fournisseurs</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <form id="jvalidate" role="form" class="form-horizontal" method="post" action="@if(empty($fournisseur)){{route('fournisseur_add_path')}}@else{{route('fournisseur_update_path')}}@endif">
                {{ csrf_field() }}
                @if(session('message'))
                    <div class="row">
                        <div class="alert alert-warning">{{session('message')}}</div>
                    </div>
                @endif
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Nom complet:</label>
                    <div class="col-md-9">
                        <input type="text" class=" form-control" name="nom" id="nom" />
                        <span class="help-block">Champs obligatoire</span>

                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">T&eacute;l&eacute;phone:</label>
                    <div class="col-md-9">
                        <input type="tel" name="tel" placeholder="Ex : 699000000" class=" form-control" value="@if(!empty($fournisseur)){{$fournisseur->tel}}@endif" id="tel"/>
                        <span class="help-block">Champs obligatoire</span>

                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Email:</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" placeholder="Ex: example@example.com" name="email" id="email" value="@if(!empty($fournisseur)){{$fournisseur->email}}@endif"/>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Adresse:</label>
                    <div class="col-md-9    ">
                        <input type="text" class=" form-control" name="adresse" id="adresse" value="@if(!empty($fournisseur)){{$fournisseur->adresse}}@endif"/>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Nom du contact :</label>
                    <div class="col-md-9    ">
                        <input type="text" class=" form-control" name="nom_contact" id="nom_contact" value="@if(!empty($fournisseur)){{$fournisseur->nom_contact}}@endif"/>
                        <span class="help-block">Champs obligatoire</span>

                    </div>
                </div>
                 <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Raison Social :</label>
                    <div class="col-md-9    ">
                        <input type="text" class=" form-control" name="raison_social" id="raison_social" value="@if(!empty($fournisseur)){{$fournisseur->raison_social}}@endif" />

                    </div>
                </div>

                <div class="btn-group pull-center">
                    <button class="btn btn-primary" type="submit">Valider</button>
                </div>
            </form>
        </div>

    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
@endsection
@section('js')
        <!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='{{asset('js/plugins/icheck/icheck.min.js')}}'></script>
<script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

<script type='text/javascript' src='{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/bootstrap/bootstrap-select.js')}}'></script>

<script type='text/javascript' src='{{asset('js/plugins/validationengine/languages/jquery.validationEngine-en.js')}}'></script>
<script type='text/javascript' src='{{asset('js/plugins/validationengine/jquery.validationEngine.js')}}'></script>

<script type='text/javascript' src='{{asset('js/plugins/jquery-validation/jquery.validate.js')}}'></script>

<script type='text/javascript' src='{{asset('js/plugins/maskedinput/jquery.maskedinput.min.js')}}'></script>
<!-- END THIS PAGE PLUGINS -->

<script type="text/javascript">
    var jvalidate = $("#jvalidate").validate({
        ignore: [],
        rules: {
            tel: {
                required: true,
                minlength: 6,
                maxlength: 9
            },

            email: {
                required: true,
                email: true
            }
        }
    });

</script>
@endsection
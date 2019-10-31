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
                <div class="form-group col-md-6">
                    <label class="control-label">Nom complet : <strong>{{$fournisseur->nom}}</strong></label>

                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">T&eacute;l&eacute;phone : <strong>{{$fournisseur->tel}}</strong></label>

                </div>
                <div class="form-group col-md-6">
                    <label class=" control-label">Email : <strong>{{$fournisseur->email}}</strong></label>

                </div>
                <div class="form-group col-md-6">
                    <label class=" control-label">Adresse : <strong>{{$fournisseur->adresse}}</strong></label>

                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Nom du contact : <strong>{{$fournisseur->nom_contact}}</strong></label>

                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Raison Social : <strong>{{$fournisseur->raison_social}}</strong></label>
                </div>


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
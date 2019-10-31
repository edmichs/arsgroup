@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Users</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

        <form class="form-horizontal" method="POST" action="{{ route('role_add_path') }}">
                {{ csrf_field() }}
                @if(session('message'))
                <div class="row">
                    <div class="alert alert-warning">{{session('message')}}</div>
                </div>
            @endif
                <div class="form-group{{ $errors->has('libelle') ? ' has-error' : '' }}">
                    <label for="libelle" class="col-md-4 control-label">Libelle</label>

                    <div class="col-md-6">
                        <input id="libelle" type="text" class="form-control" name="libelle" value="{{ old('libelle') }}" required autofocus>

                        @if ($errors->has('libelle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('libelle') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <input id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </form>
</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
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
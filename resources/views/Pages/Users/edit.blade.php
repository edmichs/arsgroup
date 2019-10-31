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

        <form class="form-horizontal" method="POST" action="{{ route('utilisateur_update_path') }}">
                {{ csrf_field() }}
                @if(session('message'))
                <div class="row">
                    <div class="alert alert-warning">{{session('message')}}</div>
                </div>
            @endif
            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}" hidden>
                    <label for="id" class="col-md-4 control-label">ID</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" name="id" value="{{ $user->id}}" >

                        @if ($errors->has('id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nom</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}"  autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Adresse Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Nouveau Mot de passe</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmation du mot de passe</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Role</label>
    
                        <div class="col-md-6">
                            <select name="role_id" id="role_id" class="form-control" required>
                                @foreach ($roles as $item)
                                <option value="{{$item->id}}" >{{$item->libelle}}</option>
                                @endforeach
                                
                            </select>
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
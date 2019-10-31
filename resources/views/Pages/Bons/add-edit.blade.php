@extends('Layouts.layout')

@section('css')
    <style>
        hr{
            border: 1px solid black;
        }
    </style>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Bon de commande</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <form id="form" role="form" class="form-horizontal" method="post" action="{{route('bon_commande_add_path')}}">
            {{ csrf_field() }}
            @if(session('message'))
                <div class="row">
                    <div class="alert alert-warning">{{session('message')}}</div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="numero_bon">
                        Numero Bon de Commande
                    </label>
                    <input type="text" name="numero_bon_commande" id="numero_bon_commande" class="form-control text-center" value="{{$numerobon}}">
                </div>
            </div>
            <div class="col-md-12">
                     <div class="form-group col-md-6">
                        <label class="control-label">Nom Client:</label>
                            <input type="text" class=" form-control" name="nom" id="nom" />
                            <span class="help-block">Champs obligatoire</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Reference Client:</label>
                            <input type="text" class=" form-control" name="reference" id="reference" />
                            <span class="help-block">Champs obligatoire</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">T&eacute;l&eacute;phone:</label>
                            <input type="tel" name="tel" placeholder="Ex : 699000000" class=" form-control"  id="tel"/>
                    </div>
            </div>
            <div class="col-md-12">
                <hr >
                <h4 class="text-center"><i class="fa fa-plus"></i>Ajouter des articles au bon de commande</h4>
                <br>
                <div class=" col-md-12">

                    <div class="form-group col-md-4">
                        <label>Article :</label>
                        <select name="article_id" id="article_id" class="selectpicker form-control">
                            <option value=""></option>
                            @foreach($articles as $article)
                            <option value="{{$article->id}}">{{$article->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Quantite :</label>
                        <input type="number" onchange="calculTotale();" name="quantite" id="quantite"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Prix Vente Unitaire (en XFA)</label>
                        <input type="number" name="prix_vente_unitaire" onchange="calculTotale();" id="prix_vente_unitaire" class="form-control">
                    </div>

                  

                    <script type="text/javascript">
                       
                        function validate(){
                            var formObj = $("#form");
                            var formURL = formObj.attr("action");
                            var formData = new FormData($("#form")[0]);
                            formData.append('validate', 'ok');

                            $.ajax({
                                url: formURL,
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (data) {
                                    //alert(data);
                                    $('#deleteModal').modal('hide');
                                    $('#prestadecompte').html(data);
                                    console.log(data);
                                    $('#example1').DataTable();

                                },
                                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                    console.log(JSON.stringify(jqXHR));
                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                    console.log($('Numero_decompte').val());
                                }
                            });
                        }


                    </script>



                </div>
                <div class="text-center">
                    <a id="validate" onclick="validate();" class="btn btn-success"><i class="fa fa-plus"></i>
                        Ajouter
                    </a>
                </div>

                <div class="col-md-12">
                    <hr>
                    <br>
                    <h4>Listes des articles du bon de commande</h4>

                    <div id="prestadecompte">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped dataTable">

                                <thead>
                                <tr>
                                    <!--th>N?</th-->
                                    <th>Designation</th>
                                    <th width="12%">Quantit&eacute;</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Totale</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 btn-group pull-center text-center">
                        <button class="btn btn-primary" type="submit">Valider</button>
                        <button class="btn btn-danger" type="reset">Annuler</button>
            </div>
            <div class="col-md-4"></div>
        </form>

    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
    <div class="modal fade in" id="deleteModal" class="deleteModal" style="display: none;">
        <div class="modal-dialog">
            <form id="form-suppr" role="form" method="POST" action="{{route('delete_article_path')}}">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                        <h4 class="modal-title">Suppression...</h4>
                    </div>
                    <div class="modal-body">
                        <p> Souhaitez-vous supprimer cette article ? </p>
                        {{ csrf_field() }}
                        <input type="text" name="suppr"  id="suppr">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                        <button type="button" id="supprimer" onclick="sup();"  class="btn btn-primary">Valider</button>

                    </div>
                    <script type="text/javascript">
                      function sup() {

                            var formObj = $("#form-suppr");
                            var formURL = formObj.attr("action");
                            var formData = new FormData($("#form-suppr")[0]);
                            formData.append('supprimer', 'ok');

                            $.ajax({
                                url: formURL,
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (data) {
                                    //alert(data);
                                    $('#deleteModal').modal('hide');
                                    $('#prestadecompte').html(data);
                                    consloe.log(data);
                                    $('#example1').DataTable();

                                    message('<h4>  suppression reussie ! </h4>', 'alert-success pull-lg-right');


                                },
                                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                    console.log(JSON.stringify(jqXHR));
                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                    console.log($('Numero_decompte').val());
                                    message("<h4> Echec de l'op&eacute;ration ! </h4>", 'alert-danger pull-lg-right');
                                }
                            });
                            e.preventDefault();
                            return false;
                        }
                    </script>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
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
    var jvalidate = $("#form").validate({
        ignore: [],
        rules: {
            reference: {
                required: true,
            },
            nom: {
                required: true,
            }
        }
    });

</script>
    <script type="text/javascript">
        function supprimer(id) {
            $('.deleteButton').on('click', function () {
                var Id = $(this).data('id');
                $(".modal-body #suppr").val(Id);
            });
        };
        function resetForm(id) {
            $('#' + id).val(function () {
                return this.defaultValue;
            });
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
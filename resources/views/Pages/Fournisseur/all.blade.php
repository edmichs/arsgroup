@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Dashboard</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="row">
                    <div class="alert alert-warning">{{session('message')}}</div>
                </div>
                @endif
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des fournisseurs</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exporter les donn&eacute;es</button>
                        <ul class="dropdown-menu">

                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="{{route('fournisseur_path')}}" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                        </ul>
                    </div>

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>T&eacute;l&eacute;phone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Nom Contact</th>
                            <th>Raison Social</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{$fournisseur->nom}}</td>
                                    <td>{{$fournisseur->tel}}</td>
                                    <td>{{$fournisseur->email}}</td>
                                    <td>{{$fournisseur->adresse}}</td>
                                    <td>{{$fournisseur->nom_contact}}</td>
                                    <td>{{$fournisseur->raison_social}}</td>
                                    <td>
                                        <div>
                                            <a
                                               class="editButton btn btn-warning"
                                               data-toggle="modal"
                                               data-id="{{$fournisseur->id}}"
                                               data-nom='{{$fournisseur->nom}}'
                                               data-tel='{{$fournisseur->tel}}'
                                               data-email='{{$fournisseur->email}}'
                                               data-adresse='{{$fournisseur->adresse}}'
                                               data-nomcontact='{{$fournisseur->nom_contact}}'
                                               data-raisonsocial='{{$fournisseur->raison_social}}'
                                               id="editButton"
                                               data-target="#editModal"
                                               title="Modifier"><i onclick="edit('{{$fournisseur->id}}','{{$fournisseur->nom}}','{{$fournisseur->tel}}','{{$fournisseur->email}}','{{$fournisseur->adresse}}','{{$fournisseur->nom_contact}}','{{$fournisseur->raison_social}}')" class="fa fa-pencil"></i></a>
                                            <a data-toggle="modal"  title="Supprimer"
                                               data-id='{{$fournisseur->id}}'
                                               id="deleteButton"
                                               class="deleteButton"
                                               data-target="#deleteModal"> <i onclick="supprimer('{{$fournisseur->id}}')" class="btn btn-danger fa fa-trash-o"></i></a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END DATATABLE EXPORT -->

        </div>
    </div>
    <!-- END WIDGETS -->

</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
<div class="modal fade in" id="deleteModal" class="deleteModal" style="display: none;">
    <div class="modal-dialog">
        <form id="form-suppr" role="form" method="POST" action="{{route('delete_fournisseur_path')}}">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title">Suppression...</h4>
                </div>
                <div class="modal-body">
                    <p> Souhaitez-vous supprimer cette article ? </p>
                    {{ csrf_field() }}
                    <input type="text" name="suppr" hidden id="suppr">
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit"  class="btn btn-primary">Valider</button>

                </div>
                <script type="text/javascript">
                    function supp(){
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
                                console.log(data);
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
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade in" id="editModal" class="editModal" style="display: none;">
    <div class="modal-dialog">
        <form id="form-suppr" role="form" method="POST" action="{{route('update_fournisseur_path')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title">Modification...</h4>
                </div>
                <div class="modal-body">

                    <input type="text" name="suppr" hidden  id="supprim">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom : </label>
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tel">Telephone : </label>
                                <input type="tel" name="tel" id="tel" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email : </label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="adresse">Adresse : </label>
                                <input type="text" name="adresse" id="adresse" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom_contact">Nom Contact : </label>
                                <input type="text" name="nom_contact" id="nom_contact" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="raison_social">Raison Social : </label>
                                <input type="text" name="raison_social" id="raison_social" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="modifier"  class="btn btn-primary">Valider</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
@section('js')

    <script type="text/javascript" src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/tableExport.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jquery.base64.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.j')}}s"></script>

    <script type="text/javascript">
        function supprimer(id) {
            $('.deleteButton').on('click', function () {
                var Id = $(this).data('id');
                $(".modal-body #suppr").val(Id);
            });
        };
        function edit(id,nom,tel,email,adresse,nomcontact,raisonsocial) {
            $('.editButton').on('click', function () {
                $(".modal-body #supprim").val(id);
                $(".modal-body #nom").val(nom);
                $(".modal-body #tel").val(tel);
                $(".modal-body #email").val(email);
                $(".modal-body #adresse").val(adresse);
                $(".modal-body #nom_contact").val(nomcontact);
                $(".modal-body #raison_social").val(raisonsocial);

            });
        };
    </script>
@endsection
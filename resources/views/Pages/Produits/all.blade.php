@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Produits</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->

    <div class="row">
        @if(session('message'))
            <div class="row">
                <div class="alert alert-warning">{{session('message')}}</div>
            </div>
        @endif
        <div class="col-md-12">

            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Exportation des donn&eacute;es de la table</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="{{route('article_path')}}" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                        </ul>
                    </div>

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Designation</th>
                            <th>Caracteristiques</th>
                            <th>Fournisseur</th>
                            <th>quantite initial</th>
                            <th>Prix Achat</th>
                            <th>Categorie</th>
                            <th>Prix Total</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->nom}}</td>
                                <td>{{$article->designation}}</td>
                                <td>{{$article->caracteristiques}}</td>
                                <td>{{$article->fournisseurs()->exists() ? $article->fournisseurs->nom : ""}}</td>
                                <td>{{$article->quantite_initial}}</td>
                                <td>{{$article->prix_achat}}</td>
                                <td>{{$article->produits()->exists() ? $article->produits->libelle : ""}}</td>
                                <td>{{$article->prix_achat * $article->quantite_initial}}</td>
                                <td>
                                    <div>
                                        <a
                                                class="editButton btn btn-warning"
                                                data-toggle="modal"
                                                data-id="{{$article->id}}"
                                                data-nom="{{$article->nom}}"
                                                data-designation='{{$article->designation}}'
                                                data-caracteristiques='{{$article->caracteristiques}}'
                                                data-quantiteinitial='{{$article->quantite_initial}}'
                                                data-prixachat='{{$article->prix_achat}}'
                                                id="editButton"
                                                data-target="#editModal"
                                                title="Modifier"><i onclick="edit('{{$article->id}}','{{$article->nom}}','{{$article->designation}}','{{$article->caracteristiques}}','{{$article->quantite_initial}}','{{$article->prix_achat}}')" class="fa fa-pencil"></i></a>
                                        <a data-toggle="modal"  title="Supprimer"
                                           data-id='{{$article->id}}'
                                           id="deleteButton"
                                           class="deleteButton"
                                           data-target="#deleteModal"> <i onclick="supprimer('{{$article->id}}')" class="btn btn-danger fa fa-trash-o"></i></a>
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
        <form id="form-suppr" role="form" method="POST" action="{{route('article_delete_path')}}">

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
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" id="supprimer" onclick="supp()" class="btn btn-primary">Valider</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade in" id="editModal" class="editModal" style="display: none;">
    <div class="modal-dialog">
        <form id="form-suppr" role="form" method="POST" action="{{route('update_article_path')}}">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title">Modification...</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="text" name="suppr" hidden  id="supprim">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="nom">Categorie : </label>
                                <select name="produit_id" id="produit_id" class="form-control">
                                    @foreach($produits as $produit)
                                        <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom">Nom : </label>
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Designation">Designation : </label>
                                <input type="text" name="designation" id="designation" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="caracteristiques">Caracteristiques : </label>
                                <input type="caracteristiques" name="caracteristiques" id="caracteristiques" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prix_achat">Prix achat : </label>
                                <input type="number" name="prix_achat" id="prix_achat" class="form-control">
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
    <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
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
        function edit(id,nom,designation,caracteristiques,quantiteinitial,prixachat) {
            $('.editButton').on('click', function () {
                console.log(nom);
                $(".modal-body #supprim").val(id);
                $(".modal-body #nom").val(nom);
                $(".modal-body #designation").val(designation);
                $(".modal-body #caracteristiques").val(caracteristiques);
                $(".modal-body #quantite_initial").val(quantiteinitial);
                $(".modal-body #prix_achat").val(prixachat);

            });
        };
    </script>
@endsection
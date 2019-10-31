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
                         <a class="btn btn-info "  href="{{route("roles_add_path")}}"><i class="fa fa-plus"></i> Nouveau role</a>
                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="{{route('utilisateurs_path')}}" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                        </ul>
                    </div>

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                        <tr>
                            <th>Libelle</th>
                            <th>Designation</th>
                           
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->libelle}}</td>
                                <td>{{$role->description}}</td>                            
                                <td>
                                    <div>
                                        <a href="{{ url("role/edit/{$role->id}") }}"
                                                class="editButton btn btn-warning"
                                              
                                                title="Modifier"><i  class="fa fa-pencil"></i></a>
                                        <a  title="Supprimer"
                                            href="{{ url("role/delete/{$role->id}")  }}"
                                           id="deleteButton"
                                           class="deleteButton"
                                           data-target="#deleteModal"> <i class="btn btn-danger fa fa-trash-o"></i></a>
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
@endsection
@section('js')
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
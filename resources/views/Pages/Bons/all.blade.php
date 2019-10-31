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
    @if(session('message'))
        <div class="row">
            <div class="alert alert-info">{{session('message')}}</div>
        </div>
    @endif
    @if(session('error'))
    <div class="row">
        <div class="alert alert-danger">{{session('error')}}</div>
    </div>
@endif
    <div class="row">
        <div class="col-md-12">

            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des Bons de commandes</h3>
                    <div class="btn-group pull-right">
                        <a href="{{route('bon_commande_add_path')}}" class="btn btn-info " ><i class="fa fa-plus"></i> Etablir un Nouveau</a>
                        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exporter les donn&eacute;es</button>
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
                    <table id="customers2" class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th >N&deg; Bon commande</th>
                                <th >Reference Client</th>
                                <th >Nom Client</th>
                                <th>Quantit&eacute; totale </th>
                                <th>Prix Total</th>
                                <th >Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bon_commandes as $bon_commande)
                            <tr>
                                @php
                                $articles = \App\Models\ArticleClients::whereNumeroBonCommande($bon_commande->numero)->get();
                                $prix_total = 0;
                                $quantite_total = 0;
                                    foreach($articles as $article){
                                        $prix_total +=  $article->prix_vente_unitaire *  $article->quantite;
                                        $quantite_total +=  $article->quantite;
                                    }
                                   
                                @endphp
                                <td >{{$bon_commande->numero}}</td>
                                <td  >{{$bon_commande->client()->exists() ? $bon_commande->client->reference : ""}}</td>
                                <td  >{{$bon_commande->client()->exists() ? $bon_commande->client->nom : ""}}</td>
                                <td >{{ $quantite_total}}</td>
                                <td>{{$prix_total}}</td>
                                <td  >
                                    <div>
                                        <a href='{{url("boncommande/show/{$bon_commande->id}")}}' class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Voir les details"><span class="fa fa-eye"></span></a>
                                        @if (Auth::user()->roles[0]->libelle != "Magasinier")
                                        <a href='{{url("/boncommande/edit/{$bon_commande->id}")}}' class="btn btn-success"  data-toggle="tooltip" data-placement="top"  title="Valider le bon de commande"><span class="fa fa-pencil"></span></a>

                                        @endif
                                        <a href=' {{ url("boncommande/print/{$bon_commande->id}") }}' class="btn btn-primary"  data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimer"><span class="fa fa-print"></span></a>
                                        <a href=' {{ url("boncommande/delete/{$bon_commande->id}") }}' class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Annuler"><span class="fa fa-trash-o"></span></a>
                                       
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

    <script type="text/javascript" src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/tableExport.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jquery.base64.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.j')}}s"></script>

@endsection
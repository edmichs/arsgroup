@extends('Layouts.layout')

@section('css')

@endsection

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.html#">Home</a></li>
    <li class="active">Bons de commandes</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->
    @if(session('message'))
        <div class="row">
            <div class="alert alert-warning">{{session('message')}}</div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">

            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><h3 class="panel-title text-center">Bon de commande N&deg; {{$bon_commande->numero}}</h3></div>
                    
                </div>
                @php
                    $articles_client = App\Models\ArticleClients::whereNumeroBonCommande($bon_commande->numero)->get();
                    $art = \App\Models\ArticleClients::whereNumeroBonCommande($bon_commande->numero)->first();
                @endphp
              
                <div class="panel-body">
                        <div class="col-md-6">
                                <h3>Nom Client : {{$bon_commande->client()->exists() ? $bon_commande->client->nom : ""}}</h3>
                                <h3>R&eacute;f&eacute;rence du client : {{$bon_commande->client()->exists() ? $bon_commande->client->reference : ""}} </h3>
                            </div>
                            <div class="col-md-6">
                                    <h3>T&eacute;l&eacute;phone  Client : {{$bon_commande->client()->exists() ? $bon_commande->client->telephone : ""}}</h3>
                                    <h3>C.N.I client : {{$bon_commande->client()->exists() ? $bon_commande->client->cni : ""}} </h3>
                            </div>
                           
                    <table  class="table  table-bordered"  style="margin-top: 10%">
                        <thead>
                            <tr>
                                <th >Nom l'article</th>
                                <th >D&eacute;signation de l'article</th>
                                <th >Caractéristiques</th>
                                <th>Catégorie de produit </th>
                                <th>Quantité</th>
                                <th >Prix Unitaire</th>
                                <th>Prix Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articles_client as $article_client)
                            <tr>
                               
                                <td >{{$article_client->article()->exists() ? $article_client->article->nom : " "}}</td>
                                <td  >{{$article_client->article()->exists() ? $article_client->article->designation : ""}}</td>
                                <td  >{{$article_client->article()->exists() ? $article_client->article->caracteristiques : ""}}</td>
                                <td>{{$article_client->article()->exists() ? $article_client->article->produits->libelle : ""}}</td>
                                <td >{{ $article_client->quantite }}</td>
                                <td>{{ $article_client->prix_vente_unitaire }}</td>
                                <td>{{ $article_client->quantite * $article_client->prix_vente_unitaire   }}</td>
                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END DATATABLE EXPORT -->
            <div class="modal-footer">
                    <a href="{{route('bon_commande_path')}}" class="btn btn-default pull-left">Retour</a>
                    <a href="{{ url("boncommande/print/{$bon_commande->id}") }}" target="_blank" class="btn btn-primary">Imprimer le bon de commande</a>

             </div>
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
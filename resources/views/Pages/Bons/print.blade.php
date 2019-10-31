<!DOCTYPE html>
<html  lang="en">
<head>
    <title>{{ config('app.name', 'Stock') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body onload="window.print();">
    <div class="page-container">
                <!--HEADER-->         
        <div class="page-content-wrap">
                        
                <div class="row">
                        <div class="col-md-12">
                
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <p class="text-center"><h2>LE GRAND SERVICE</h2> PO.BOX: 341 Limbe, Tel: 698-77-09-83 / 677-94-70-27 <br>E-mail: legrandservice@yahoo.com <br>CNPS N&deg; 411-10309680N, Contribuable: P078012582897OTPPRR/RC/L&apos;BE/2017/A/06</p>
                                <div class="panel-heading">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"><h3 class="panel-title text-center">Bon de commande N&deg; {{$bon_commande->numero}}</h3></div>
                                    
                                </div>
                                @php
                                $total = 0;
                                    $articles_client = App\Models\ArticleClients::whereNumeroBonCommande($bon_commande->numero)->get();
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
                                                    @php
                                                    $total += $article_client->quantite * $article_client->prix_vente_unitaire;
                                                @endphp
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
                                    <br><br>
                                    <p class="text-right">Total: <strong>{{ $total }}</strong> FCFA</p>
                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
        </div>
                    
                    
     </div>

        <!-- START BREADCRUMB -->
    </body>
    </html>

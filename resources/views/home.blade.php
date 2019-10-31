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
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            @php
                $entrees = \App\Models\Mouvement::whereType(1)->get();
                $sorties = \App\Models\Mouvement::whereType(0)->get();
                $countentrees = 0;
                $countsorties = 0;
                foreach($entrees as $entree){
                    $countentrees += $entree->quantite ;
                }
                foreach($sorties as $sortie){
                    $countsorties += $sortie->quantite ;
                }

            @endphp
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">Total Factures</div>
                        <div class="widget-subtitle"></div>
                        <div class="widget-int">{{ count($factures)}}</div>
                    </div>
                    <div>
                        <div class="widget-title">Total Entr&eacute;es</div>
                        <div class="widget-subtitle"></div>
                        <div class="widget-int">{{ $countentrees }}</div>
                    </div>
                    <div>
                        <div class="widget-title">Total Sorties</div>
                        <div class="widget-subtitle"></div>
                        <div class="widget-int">{{ $countsorties }}</div>
                    </div>
                    <div>
                        <div class="widget-title">Total Stock disponible</div>
                        <div class="widget-subtitle"></div>
                        <div class="widget-int">{{ $countentrees - $countsorties}}</div>
                    </div>
                </div>
                <div class="widget-controls">
                    <a href="index.html#" class="widget-control-right widget-remove" data-toggle="tooltip"
                       data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" >
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{count($fournisseurs)}}</div>
                    <div class="widget-title">Fournisseurs</div>
                </div>
                <div class="widget-controls">
                    <a href="index.html#" class="widget-control-right widget-remove" data-toggle="tooltip"
                       data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" >
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{count($clients)}}</div>
                    <div class="widget-title">Clients</div>
                </div>
                <div class="widget-controls">
                    <a href="index.html#" class="widget-control-right widget-remove" data-toggle="tooltip"
                       data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="index.html#" class="widget-control-right widget-remove" data-toggle="tooltip"
                       data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="index.html#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="index.html#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="index.html#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>
            </div>
            <!-- END WIDGET CLOCK -->

        </div>
    </div>
    <!-- END WIDGETS -->

    <div class="row">
        <div class="col-md-8">

            <!-- START SALES BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Achats & Ventes</h3>
                        <span>disponibilit&eacute; en stock par articles</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                               title="Refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        derouler</a></li>
                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> supprimer</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row stacked">
                        <table id="customers2" class="table datatable table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Total Entr&eacute;e</th>
                                    <th>Total Sortie</th>
                                    <th>Disponible en stock</th>
                                    <th>Seuil</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                @php
                                    $entrees = \App\Models\Mouvement::whereArticleId($article->id)->whereType(0)->get();
                                    $sorties = \App\Models\Mouvement::whereArticleId($article->id)->whereType(1)->get();
                                    $dispo = count($entrees) - count($sorties)
                                @endphp
                                <tr>
                                    <td>{{$article->nom}}</td>
                                    <td>{{count($entrees)}} </td>
                                    <td>{{count($sorties)}}</td>
                                    <td>{{$dispo}}</td>
                                    <td>
                                        @if($dispo < 0)
                                            Indisponible
                                        @elseif($dispo >= 0 && $dispo<=10)
                                            Seuil Critique atteint
                                        @else
                                            Disponible
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SALES BLOCK -->

        </div>
        <div class="col-md-4">

            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Fournisseurs</h3>
                        <span>Pourcentage de sortie par fournisseur</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                               title="Refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Derouler</a></li>
                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Fermer</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table id="customers1" class="table datatable  table-bordered table-striped" >
                            <thead>
                            <tr>
                                <th width="50%">Nom Fournisseur</th>
                                <th width="20%">Adresse/Telephone</th>
                                <th width="30%">Total livr&eacute;s</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fournisseurs as $fournisseur)
                                @php
                                    $articles = \App\Models\Articles::whereFournisseur_id($fournisseur->id)->get();
                                @endphp
                            <tr>
                                <td><strong>{{$fournisseur->nom}}</strong></td>
                                <td>{{$fournisseur->tel}}</td>
                                <td>
                                    {{count($articles)}}
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- END PROJECTS BLOCK -->

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Ventes </h3>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                               title="Refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Remove</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div id="dashboard-line-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->

        </div>
        <div class="col-md-4">

            <!-- START USERS ACTIVITY BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Activit&eacute; des utilisateurs</h3>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                               title="Refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Remove</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div id="dashboard-bar-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END USERS ACTIVITY BLOCK -->

        </div>
        <div class="col-md-4">

            <!-- START VISITORS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Clients</h3>
                        <span>Liste de tous les clients</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                               title="Refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Derouler</a></li>
                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Fermer</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="row stacked">
                        <table id="customers3" class="table datatable table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>R&eacute;f&eacute;rence</th>
                                <th>Nom</th>
                                <th>T&eacute;l&eacute;phone</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)

                                <tr>
                                    <td>{{$client->reference}}</td>
                                    <td>{{$client->nom}} </td>
                                    <td>{{$client->telephone}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- END VISITORS BLOCK -->

        </div>
    </div>

    <!-- START DASHBOARD CHART -->
    <div class="block-full-width">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Mouvements</h3>
                    <span>Liste de tous les mouvements de stocks</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top"
                           title="Refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                    Derouler</a></li>
                            <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Fermer</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body padding-0">
                <div class="row stacked">
                    <table id="customers3" class="table datatable table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantite</th>
                            <th>Prix unitaire</th>
                            <th>Type</th>
                            <th>Utilisateur</th>
                            <th>Date du mouvement</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mouvements as $mouvement)

                            <tr>
                                <td>{{$mouvement->article()->exists() ? $mouvement->article->nom : ""}}</td>
                                <td>{{$mouvement->quantite}} </td>
                                <td>{{$mouvement->prix}}</td>
                                <td>{{$mouvement->type == 0 ? "Sortie" : "Entrée" }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{$mouvement->created_at }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- END DASHBOARD CHART -->

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

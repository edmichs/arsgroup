@extends('Layouts.layout')

@section('css')
@endsection

@section('content')
        <!-- aboutus -->
<section class="aboutus" id="aboutus">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow bounceInLeft" data-wow-delay="0.1s">
                    <h2>Contribution</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-2">
                                <label>Ann&eacute;e: </label>
                                <select id="PoliceID" name="PoliceID" class="form-control">
                                    <option value=" ">-- selectionnner une police --</option>

                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nom">Communaut&eacute;: </label>
                                <select id="PrestationID" name="PrestationID" class="form-control">
                                    <option value=" ">-- selectionnner une prestation --</option>

                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Regroupement: </label>
                                <select id="Type_EmployeID" name="Type_EmployeID" class="form-control">
                                    <option value=" ">-- selectionnner type employ&eacute; --</option>

                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telephone">Membre : <span>*</span></label>
                                <select id="Type_EmployeID" name="Type_EmployeID" class="form-control">
                                    <option value=" ">-- selectionnner type employ&eacute; --</option>

                                </select></div>
                            <div class="form-group col-md-3" style="margin-top: 2%">
                                <button for="telephone" type="submit" class="btn btn-success">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </form>
             </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow bounceInLeft" data-wow-delay="0.1s">
                    <h2>Liste des contributions</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                <tr>
                                    <th>Semestre 1</th>
                                    <th>Semestre 2</th>
                                    <th>Semestre 3</th>
                                    <th>Semestre 4</th>
                                    <th>Solde</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.aboutus -->
@endsection

@section('js')

@endsection
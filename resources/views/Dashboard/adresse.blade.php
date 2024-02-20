@extends('Dashboard.app')
@section('content')
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Ajouter adresse</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                                        <li class="breadcrumb-item"><a href="save" class="breadcrumb-link">Ajout d'adresse de retrait</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Formulaire d'ajout</h5>
                                <div class="card-body">
                                    <form action="/saveAdresse" id="basicform" data-parsley-validate="" method="post">
                                        @csrf
                                        <div class="row">

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Adresse</label>
                                            <input id="inputUserName" type="text" name="adresse" data-parsley-trigger="change" required="" placeholder="Entrez une adresse" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Valider</button>

                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection

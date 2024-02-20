@extends('Dashboard.app')
@section('content')
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Enrégistrement</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                                        <li class="breadcrumb-item"><a href="save" class="breadcrumb-link">Enrégistrement</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Formulaire de modification</h5>
                                <div class="card-body">
                                    <form action="/modif" id="basicform" data-parsley-validate="" method="post">
                                        @csrf
                                         @foreach($model as $models)
                                         <input type="hidden" name="id_locataire" value="{{$models->id}}">
                                        <div class="row">

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Nom</label>
                                            <input id="inputUserName" type="text" name="nom" data-parsley-trigger="change" required="" placeholder="Entrez un nom" autocomplete="off" class="form-control" value="{{$models->nom}}"> 
                                            </div>

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Prénom</label>
                                            <input id="inputUserName" type="text" name="prenom" data-parsley-trigger="change" required="" placeholder="Entrez un prénom" autocomplete="off" class="form-control" value="{{$models->prenom}}"> 
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Téléphone</label>
                                            <input id="inputUserName" type="text" name="tel" data-parsley-trigger="change" required="" placeholder="Entrez le numero de téléphone" autocomplete="off" class="form-control" value="{{$models->telephone}}"> 
                                            </div>

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Appartement</label>
                                            <input id="inputUserName" type="text" name="description" data-parsley-trigger="change" required="" placeholder="Entrez le type d'appartement" autocomplete="off" class="form-control" value="{{$models->description_appartement}}"> 
                                            </div>
                                            
                                        </div>

                                        <div class="row">

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Avance</label>
                                            <input id="inputUserName" type="text" name="avance" data-parsley-trigger="change" required="" placeholder="Entrez l'avance" autocomplete="off" class="form-control" value="{{$models->avance}}"> 
                                            </div>
                                            
                                        </div>

                                        <div class="row">

                                            <div class="col-6 form-group">
                                            <label for="inputUserName">Loyé</label>
                                            <input id="inputUserName" type="text" name="loye_paye" data-parsley-trigger="change" required="" placeholder="Entrez le montant du loyé" autocomplete="off" class="form-control" value="{{$models->loye_paye}}" > 
                                            </div>
                                            
                                        </div>
                                           
                                        <div class="row">
                                                <p>Paiement du</p>
                                            <div class="col-4 form-group">
                                            <input id="inputUserName" type="date" name="date_debut" data-parsley-trigger="change" required="" placeholder="Début de valité" autocomplete="off" class="form-control" value="{{$models->date_debut}}"> 
                                            </div>
                                                <p>Au</p>
                                            <div class="col-4 form-group">
                                            <input id="inputUserName" type="date" name="date_fin" data-parsley-trigger="change" required="" placeholder="Fin de validité" autocomplete="off" class="form-control" value="{{$models->date_fin}}"> 
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Modifier</button>
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection
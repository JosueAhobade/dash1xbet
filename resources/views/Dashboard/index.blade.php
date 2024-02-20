@extends('Dashboard.app')
@section('content')
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2">Clients </h3>

                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>

                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Clients</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($client)}} </h1>
                                </div>
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total des opérations</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($operation)}} </h1>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Dépôts  en attentes</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($depot)}}</h1>
                                </div>
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Retraits en attentes</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($retrait)}}</h1>
                                </div>
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- metric -->

                </div>
                <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Liste des clients</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">N°</th>
                                                <th scope="col">Nom & Prénom</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Numero</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $co = 1; ?>
                                            @foreach($client as $clients )
                                            <tr>
                                                <th scope="row"><?php echo $co++; ?></th>
                                                <td>{{$clients->nom}}  {{$clients->prenom}}</td>
                                                <td>{{$clients->email}}</td>
                                                <td>{{$clients->numero}}</td>
                                                <td>{{$clients->id_compte}}</td>
                                                 <td>
                                                    <ul class="d-flex">
                                                        <li><a href="edit{{$clients->id}}" style="color: blue;"><i class="fas fa-edit"></i> Modifier</a></li>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <li><a href="delete{{$clients->id}}" style="color: red;"><i class="fas fa-trash-alt"></i> Supprimer</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection

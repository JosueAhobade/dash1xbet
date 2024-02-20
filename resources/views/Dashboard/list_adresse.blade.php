@extends('Dashboard.app')
@section('content')
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2">Adresse de retraits </h3>

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
                    <a href="/ajoutAdresse" class="btn-success">Ajouter</a>
                </div>
                <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Liste des adresses</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">N°</th>
                                                <th scope="col">Admin</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $co = 1; ?>
                                            @foreach($adresse as $adr )
                                            <tr>
                                                <th scope="row"><?php echo $co++; ?></th>
                                                @if($adr->adminId == auth()->user()->id)
                                                <td>Moi</td>
                                                @else
                                                <td>{{$adr->nom}} {{$adr->prenom}}</td>
                                                @endif

                                                <td>{{$adr->adresse}}</td>
                                                @if($adr->isActive == '1')
                                                 <td>
                                                    <ul class="d-flex">
                                                        <li><a href="unlock{{$adr->id}}" style="color: red;"><i class="fas fa-trash-alt"></i> Désactiver</a></li>
                                                    </ul>
                                                </td>
                                                @elseif($adr->isActive == '0')
                                                <td>
                                                    <ul class="d-flex">
                                                        <li><a href="unlock{{$adr->id}}" style="color: green;"><i class="fas fa-edit"></i> Activer</a></li>
                                                    </ul>
                                                </td>
                                                @else
                                                <td>
                                                    <ul class="d-flex">
                                                        <li><a href="#" style="color: gray;"><i class="fas fa-edit"></i> Activer</a></li>
                                                    </ul>
                                                </td>
                                                @endif

                                                @if($adr->isActive == '1')
                                                <td style="color: green">Active</td>
                                               @else
                                               <td style="color: red">Inactif</td>
                                               @endif
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

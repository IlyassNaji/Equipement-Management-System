<!-- Ajouter le formulaire de recherche -->

@extends('layouts.app1')

@section('content')

<form action="{{ route('maintenance.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher " name="query">
        <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
    </div>
   
</form>

<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des maintenances</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Id equipement</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($Maintenance) > 0)
                @foreach ($Maintenance as $maintenance)
                <tr>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->id_maintenance }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->type_maintenance }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->date_maintenance }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->id_equipement }}</strong>
                        </a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->usertype=='1' || Auth::user()->usertype=='2')
                               
                                <li><a class="dropdown-item" href="{{ route('maintenance.accept', $maintenance->id_maintenance) }}"><i class='bx bx-check'></i> Accept</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('maintenance.delete', $maintenance->id_maintenance) }}"><i class="bx bx-trash me-1"></i> Supprimer</a></li>
                                <li><a class="dropdown-item" href="{{ route('maintenance.details', $maintenance->id_maintenance) }}"><i class="bx bx-show me-1"></i> Details</a></li>
                                <li><a class="dropdown-item" href="{{ route('maintenance.edit', $maintenance->id_maintenance) }}"><i class="bx bx-edit-alt me-1"></i> Modifier</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <p>Aucun résultat trouvé.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Id equipement</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table vide -->
                </tbody>
            </table>
                @endif
            </tbody>
        </table>
       
    </div>
</div>
@endsection
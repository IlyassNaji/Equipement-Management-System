<!-- Ajouter le formulaire de recherche -->

@extends('layouts.app1')

@section('content')

<form action="{{ route('equipement.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher " name="query">
        <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
    </div>
    
</form>

<!-- Liste des médicaments -->
<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des equipements</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($equip) > 0)
                @foreach ($equip as $Equipement)
                <tr>
                    
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $Equipement->id_equipement }}</strong>
                        </a>
                    </td>

                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $Equipement->nom }}</strong>
                        </a>
                    </td>
                    
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                        

                        </a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if(Auth::user()->usertype=='1')
                                <a class="dropdown-item" href="{{ route('equipement.edit', $Equipement->id_equipement) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Modifier
                                </a>
                                <a class="dropdown-item" href="{{ route('equipement.delete', $Equipement->id_equipement) }}">
                                    <i class="bx bx-trash me-1"></i> Supprimer
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('equipement.details', $Equipement->id_equipement) }}">
                                <i class="bx bx-show me-1"></i> Details
                                </a>
                            </a>
                            <a class="dropdown-item" href="{{ route('equipement.maintenance', $Equipement->id_equipement) }}">
                            <i class="bx bx-show me-1"></i> Demande de Maintenance
                            </a>

                            </div>
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
                    <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                @endif
            </tbody>
        </table>
        
    </div>
</div>
@endsection
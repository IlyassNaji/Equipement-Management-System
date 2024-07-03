@extends('layouts.app1')

@section('content')

<form action="{{ route('besoin.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher " name="query">
        <button class="btn btn-outline-secondary"  type="submit">Rechercher</button>
    </div>
</form>

<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des besoins </h5>
    <div class="table-responsive text-nowrap">
        @if($Besoin->count() > 0)
            <table class="table table-striped" style="margin-bottom: 10px;">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>type</th>
                        <th>status</th>
                        <th>date</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($Besoin as $besoin)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    <strong>{{ $besoin->id_besoin }}</strong>
                                </a>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    <strong>{{ $besoin->type_besoin }}</strong>
                                </a>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    <strong>{{ $besoin->status}}</strong>
                                </a>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    <strong>{{ $besoin->date_besoin}}</strong>
                                </a>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    <strong>{{ $besoin->description}}</strong>
                                </a>
                            </td>    
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('besoin.edit', $besoin->id_besoin) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                        </a>
                                        <a class="dropdown-item" href="{{ route('besoin.delete', $besoin->id_besoin) }}">
                                            <i class="bx bx-trash me-1"></i> Supprimer
                                        </a>
                                        <a class="dropdown-item" href="{{ route('besoin.details', $besoin->id_besoin) }}">
                                            <i class="bx bx-show me-1"></i> Details
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun résultat trouvé.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>type</th>
                        <th>status</th>
                        <th>date</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table vide -->
                </tbody>
            </table>
        @endif
        
    </div>
</div>
@endsection


@extends('layouts.app1')

@section('content')

<form action="{{ route('user.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher " name="query">
        <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
    </div>
    
</form>

<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des Utilisateurs</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>email</th>
                    <th>usertype</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($User) > 0)
                @foreach ($User as $user)
                <tr>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->name }}</strong>
                        </a>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Modifier
                                </a>
                                <a class="dropdown-item" href="{{ route('user.delete', $user->id) }}">
                                    <i class="bx bx-trash me-1"></i> Supprimer
                                </a>
                                <a class="dropdown-item" href="{{ route('user.details', $user->id) }}">
                                <i class="bx bx-show me-1"></i> Details
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
                            <th>id</th>
                            <th>nom</th>
                            <th>email</th>
                            <th>usertype</th>
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
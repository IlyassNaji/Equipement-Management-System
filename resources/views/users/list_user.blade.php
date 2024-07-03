<!-- Ajouter le formulaire de recherche -->

@extends('layouts.app1')
@section('content')

    <h2 class="fw-bolder py-3 mb-4">Utilisateurs</h2>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

<div class="demo-inline-spacing" style="margin-bottom: 50px;">
        <a style="color: white;" href="{{ route('user.create') }}" class="btn btn-lg btn-primary">
            <span class="tf-icons bx bx-plus"></span>&nbsp;Nouveau Utilisateur
        </a>
    </div>

    <div class="demo-inline-spacing" style="margin-bottom: 50px;">
        <a style="color: white;" href="{{ route('user.search') }}" class="btn btn-lg btn-primary">
            <span class="tf-icons bx bx-search"></span>&nbsp;Rechercher
        </a>
    </div>
   
<!-- Liste des Users -->
<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des Utilisateurs</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Profil</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($User) > 0)
                @foreach ($User as $user)
                @if($user->usertype=='0' || $user->usertype=='2')
                <tr>

                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->profile_photo_path }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->id }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->name }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->phone }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $user->email }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                                @switch($user->usertype)
                                @case(0)
                                <strong>Employe</strong>
                                @break
    
                                @case(1)
                                <strong>Admin</strong>
                                @break
    
                                @case(2)
                                <Strong>Technicien</Strong>
                                 @break
    
                                @default
                                <strong>Invalid</strong>
                                @endswitch
    
                        </a>
                    </td>
                    <td>
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
                @endif
                @endforeach
                @else
                <tr>
                    <td colspan="3" align="center">aucun utilisateur 🤷‍♂️</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



@endsection
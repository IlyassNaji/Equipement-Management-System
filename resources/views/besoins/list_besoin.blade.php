<!-- Ajouter le formulaire de recherche -->

@extends('layouts.app1')

@section('content')

    <h2 class="fw-bolder py-3 mb-4">Besoins</h2>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="demo-inline-spacing" style="margin-bottom: 50px;">
        <a href="{{ route('besoin.search') }}" class="btn btn-lg btn-primary">
            <span class="bx bx-search"></span>&nbsp;Rechercher
        </a>
    </div>
    
      
   
<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des besoins</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Equipement Id</th>
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
                            <strong>{{ $besoin->user_id }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $besoin->id_equipement }}</strong>
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
                           
                            <ul class="dropdown-menu">
                                @if(Auth::user()->usertype=="1")
                                <li><a class="dropdown-item" href="{{ route('equipement.assign', $besoin->id_equipement) }}"><i class='bx bx-check'></i> Accepter</a></li>
                                <li><a class="dropdown-item" href="{{ route('besoin.refuse', $besoin->id_besoin) }}"><i class='bx bx-x'></i> Refuse</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('besoin.edit', $besoin->id_besoin) }}"><i class="bx bx-edit-alt me-1"></i> Modifier</a></li>
                                <li><a class="dropdown-item" href="{{ route('besoin.delete', $besoin->id_besoin) }}"><i class="bx bx-trash me-1"></i> Supprimer</a></li>
                                <li><a class="dropdown-item" href="{{ route('besoin.details', $besoin->id_besoin) }}"><i class="bx bx-show me-1"></i> Details</a></li>
                            </ul>
                        </div>   
                    </td>
                    

                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>



@endsection
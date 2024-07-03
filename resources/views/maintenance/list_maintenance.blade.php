<!-- Ajouter le formulaire de recherche -->

@extends('layouts.app1')

@section('content')

    <h2 class="fw-bolder py-3 mb-4">Maintenances</h2>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

  
<div class="demo-inline-spacing" style="margin-bottom: 50px;">
    <a style="color: white;" href="{{ route('maintenance.search') }}" class="btn btn-lg btn-primary">
        <span class="tf-icons bx bx-search"></span>&nbsp;Rechercher
    </a>
</div>

<!-- Liste des maintenances -->
<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des maintenances</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Cout</th>
                    <th>Date</th>
                    <th>Id equipement</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($Maintenance as $maintenance)
                <tr>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->user_id }}</strong>
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
                            <strong>{{ $maintenance->description }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->status }}</strong>
                        </a>
                    </td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <a href="#" class="btn-show-details"  data-bs-toggle="modal"
                            data-bs-target="#modalScrollable">
                            <strong>{{ $maintenance->cout_maintenance }}</strong>
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
                                @if( Auth::user()->usertype=="2")  
                                <li><a class="dropdown-item" href="{{ route('maintenance.accept', $maintenance->id_maintenance) }}"><i class='bx bx-check'></i> Fix</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('maintenance.delete', $maintenance->id_maintenance) }}"><i class="bx bx-trash me-1"></i> Supprimer</a></li>
                                <li><a class="dropdown-item" href="{{ route('maintenance.details', $maintenance->id_maintenance) }}"><i class="bx bx-show me-1"></i> Details</a></li>
                                <li><a class="dropdown-item" href="{{ route('maintenance.edit', $maintenance->id_maintenance) }}"><i class="bx bx-edit-alt me-1"></i> Modifier</a></li>
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
@extends('layouts.app1')



@section('content')

    
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="fw-bolder py-3 mb-4 ">{{-- <span class="text-muted fw-light">Tables /</span> --}} Ajouter un equipement</h2>
    @if(count($errors)>0)
       @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
       @endforeach
    @endif   



    <form action="{{route('equipement.store')}}" method="post" enctype="multipart/form-data">   
        @csrf 
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">nom</label>
                            <input class="form-control" type="text" name="nom" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Categorie</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="categorie">
                            <option selected hidden>Open this select menu</option>
                            <option value="materiel informatique">materiel informatique</option>
                            <option value="immobilier">immobilier</option>
                            <option value="Autre">Accesoires</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Etat</label>
                            <input class="form-control" type="text" name="état" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Marque</label>
                            <input class="form-control" type="text" name="marque" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Modele</label>
                            <input class="form-control" type="text" name="modele" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Numero de Serie</label>
                            <input class="form-control" type="text" name="numero_serie" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Date Achat</label>
                            <input class="form-control" type="date" name="date_achat" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Valable</label>
                            <input class="form-control" type="text" name="valable" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Emplacement</label>
                            <input class="form-control" type="text" name="num_bureau" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">id_utilisateur</label>
                            <input class="form-control" type="text" name="user_id" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" id="formFile" name="image"/>
                        </div>
                       
                        <div class="d-flex p-2 mt-4 justify-content-center">
                            <div class="col-sm-3 m-2">
                                <input class="btn rounded-pill btn-primary w-100" type="submit" value="Ajouter"/>
                            </div >
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>



@endsection
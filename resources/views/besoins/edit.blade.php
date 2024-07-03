@extends('layouts.app1')



@section('content')

    
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="fw-bolder py-3 mb-4 ">{{-- <span class="text-muted fw-light">Tables /</span> --}} Modifier un Besoin</h2>
    @if(count($errors)>0)
       @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
       @endforeach
    @endif   



    <form action="{{route('besoin.update',$Besoin->id_besoin)}}" method="post" enctype="multipart/form-data">   
       @method("PUT")
      @csrf 
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8">
            <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">id</label>
                            <input class="form-control" type="text" name="id_besoin" id="html5-text-input" value="{{$Besoin->id_besoin}}" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Type</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="categorie_med">
                            <option selected hidden>Open this select menu</option>
                            <option value="1">materiel informatique</option>
                            <option value="2">immobilier</option>
                            <option value="3">changement de bureau</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">date</label>
                            <input class="form-control" type="date" name="date_besoin" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">description</label>
                            <input class="form-control" type="text" name="description" id="html5-text-input" />
                        </div>
                        <div class="d-flex p-2 mt-4 justify-content-center">
                            <div class="col-sm-3 m-2">
                                <input class="btn rounded-pill btn-primary w-100" type="submit" value="Ajouter"/>
                            </div >
                        
                        <div class="d-flex p-2 mt-4 justify-content-center">
                            <div class="col-sm-3 m-2">
                                <input class="btn rounded-pill btn-primary w-100" type="submit" value="Modifier"/>
                            </div >
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>
@endsection
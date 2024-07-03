@extends('layouts.app1')



@section('content')

    
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="fw-bolder py-3 mb-4 ">{{-- <span class="text-muted fw-light">Tables /</span> --}} Ajouter une maintenance</h2>
    @if(count($errors)>0)
       @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
       @endforeach
    @endif   



    <form action="{{route('maintenance.store')}}" method="post" enctype="multipart/form-data">   
        @csrf 
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8">
            <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Type</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="type_maintenance">
                            <option selected hidden>Open this select menu</option>
                            <option value="preventive">Maintenance préventive</option>
                            <option value="corrective">Maintenance Corrective</option>
                            <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_maintenance" class="form-label">Description</label>
                            <input class="form-control" type="text" name="description" id="date_maintenance" />
                        </div>  
                        <div class="mb-3">
                            <label for="date_maintenance" class="form-label">Date</label>
                            <input class="form-control" type="date" name="date_maintenance" id="date_maintenance" />
                        </div>                        
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">cout</label>
                            <input class="form-control" type="text" name="cout_maintenance" id="html5-text-input" />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">equipement_id</label>
                            <input class="form-control" type="text" name="id_equipement" id="html5-text-input" value="{{ $id_equipement }}" />
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
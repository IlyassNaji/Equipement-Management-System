@extends('layouts.app1')



@section('content')

    
<div class="container-xxl flex-grow-1 container-p-y">
    <h2>Affecter un equipement</h2>
    @if(count($errors)>0)
       @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
       @endforeach
    @endif   



    <form action="{{route('equipement.affect',$equipement)}}" method="post" enctype="multipart/form-data">   
        @csrf 
        @method('PUT')
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8">
            <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">ID de l'employe</label>
                            <input class="form-control" type="text" name="user_id" value="{{$user->user_id}}" id="html5-text-input"  />
                        </div>
                        <div class="mb-3">
                            <label for="html5-text-input" class="form-label">Numero de bureau</label>
                            <input class="form-control" type="text" name="num_bureau" id="html5-text-input" value="{{$bureau['num_bureau']}}" />
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
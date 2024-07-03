
@extends('layouts.app1')

@section('content')



 <h2 style="margin: 50px 0 100px 20px;"> Details equipements</h2>

  
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Image</th>
                <td width="60px">
                    <div class="imgBx"><img src="{{asset($equip->image)}}" alt=""></div>
                </td>
            </tr>
            <tr>
                <th scope="row">id</th>
                <td>{{ $equip->id_equipement }}</td>
            </tr>
            <tr>
                <th scope="row">description</th>
                <td>{{ $equip->description }}</td>
            </tr>
            <tr>
                <th scope="row">marque</th>
                <td>{{ $equip->marque }}</td>
            </tr>
            <tr>
                <th scope="row">nom</th>
                <td>{{ $equip->nom }}</td>
            </tr>
            <tr>
                <th scope="row">modele</th>
                <td>{{ $equip->modele }}</td>
            </tr>
            <tr>
                <th scope="row">numero de serie</th>
                <td>{{ $equip->numero_serie }}</td>
            </tr>
            <tr>
                <th scope="row">date achat</th>
                <td>{{ $equip->date_achat}}</td>
            </tr>
            <tr>
                <th scope="row">Emplacement</th>
                <td>{{ $equip->num_bureau}}</td>
            </tr>
            <tr>
                <th scope="row">Etat</th>
                <td>{{ $equip->état }}</td>
            </tr>
           
        </tbody>
    </table>
</div>


@endsection
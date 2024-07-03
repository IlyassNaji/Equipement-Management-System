
@extends('layouts.app1')

@section('content')



 <h2 style="margin: 50px 0 100px 20px;"> Details besoin</h2>

  
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">id</th>
                <td>{{ $Besoin->id_besoin }}</td>
            </tr>
            <tr>
                <th scope="row">type</th>
                <td>{{ $Besoin->type_besoin }}</td>
            </tr>
            <tr>
                <th scope="row">status</th>
                <td>{{ $Besoin->status }}</td>
            </tr>
            <tr>
                <th scope="row">type</th>
                <td>{{ $Besoin->date_besoin }}</td>
            </tr>
            <tr>
                <th scope="row">description</th>
                <td>{{ $Besoin->description }}</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
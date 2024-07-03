
@extends('layouts.app1')

@section('content')



 <h2 style="margin: 50px 0 100px 20px;"> Details maintenances</h2>

  
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Id</th>
                <td>{{ $Maintenance->id_maintenance }}</td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td>{{ $Maintenance->type_maintenance }}</td>
            </tr>
            <tr>
                <th scope="row">Cout</th>
                <td>{{ $Maintenance->cout_maintenance }}</td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td>{{ $Maintenance->date_maintenance }}</td>
            </tr>
            <tr>
                <th scope="row">Status</th>
                <td>{{ $Maintenance->status }}</td>
            </tr>
            <tr>
                <th scope="row">Id equipement</th>
                <td>{{ $Maintenance->id_equipement }}</td>
            </tr>
           
        </tbody>
    </table>
</div>
@endsection
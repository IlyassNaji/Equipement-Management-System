
@extends('layouts.app1')

@section('content')



 <h2 style="margin: 50px 0 100px 20px;"> Details users</h2>

  
<div class="table-responsive">  
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Image</th>
                <td>{{ $User->profile_photo_path }}</td>
            </tr>
            <tr>
                <th scope="row">id</th>
                <td>{{ $User->id }}</td>
            </tr>
            <tr>
                <th scope="row">Nom</th>
                <td>{{ $User->name }}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $User->email }}</td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td>{{ $User->phone }}</td>
            </tr>
            <tr>
                <th scope="row">Profile</th>
                <td>{{ $User->usertype }}</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
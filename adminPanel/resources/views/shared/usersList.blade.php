@extends('main')
@include('bootstrap')
@section('users')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container"style="margin-left:25%;padding:100px 16px;height:750;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>

                                <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Last Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Password</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>

                                <td>
                                    <span class="text-muted">{{$user->nom}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{$user->prenom}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{$user->email}}</span><br>

                                </td>
                                <td>
                                    <span class="text-muted">{{$user->mot_de_passe}}</span><br>
                                </td>
                                <td>
                                    <a href="{{route('destroyUser',['id'=>$user->id])}}" type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </a>

                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    @if(Session::get('success'))
                <div class="alert alert-success ">
                    {{Session::get('success')}}
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>
@endsection

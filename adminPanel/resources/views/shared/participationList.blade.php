@extends('main')
@include('bootstrap')
@section('participation')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container"style="margin-left:25%;padding:100px 16px;height:750;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Manage Participations</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>

                                <th scope="col" class="border-0 text-uppercase font-medium">User Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium"> User Last Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Tournament Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Tournament Start date</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Tournament End date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($participations as $participation)
                            <tr>

                                <td>
                                    <span class="text-muted">{{$participation->nom_utilisateur}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{$participation->prenom}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{$participation->email}}</span><br>

                                </td>
                                <td>
                                    <span class="text-muted">{{$participation->nom_tournoi}}</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">{{$participation->date_debut}}</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">{{$participation->date_fin}}</span><br>
                                </td>
                                <td>
                                    <a href="{{route('destroyParticipation',['id'=>$participation->id])}}" type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </a>

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

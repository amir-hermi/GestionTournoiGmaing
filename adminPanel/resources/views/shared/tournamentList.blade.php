@extends('main')
@section('tournamentslist')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        background-color : #f0f0f5;
    }
        .btn {
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            margin-top: 1rem;
            margin-left: 28rem;
        }
        .btn:hover {
            background-color: #1e7e34;
        }

        .container-xbox {
            background-image: url("{{asset('images/banner/xbox-one-banner.png')}}");
            background-repeat: no-repeat;
            height: 50px;
            background-size: auto 700%;
            margin-bottom: 1rem;
        }
        .container-mobile {
            background-image: url("{{asset('images/banner/mobile.jpg')}}");
            background-repeat: no-repeat;

            height: 50px;
            background-size: 100% 1100%;
            margin-bottom: 1rem;
        }
        .container-ps4 {
            background-image: url("{{asset('images/banner/ps4-banner-logo.png')}}");
            background-repeat: no-repeat;

            height: 50px;
            background-size: 100% 900%;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        .container-pc {
            background-image: url("{{asset('images/banner/pc.png')}}");
            background-repeat: no-repeat;

            height: 50px;
            background-size: 100% 1200%;
            margin-bottom: 1rem;
        }
        .H2{
            margin-top: 5rem;
            margin-left: 2rem;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 8px;
            width: 18rem;
            margin-bottom: 2rem;
            margin-right: 1rem;
        }

        img {
            border-radius: 5px 5px 0 0;
        }
        .card:hover {
            box-shadow: 0 16px 16px 0 rgba(0,0,0,0.2);
        }
        .container {
            padding: 2px 16px;
        }
    </style>

    <div class="container">
        <hr>
        <h1 style="padding-left:33%;">Tournaments List</h1>

        <hr>
        <a href="{{route('create')}}" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> New Tournament</a>
        <div class="results">
            <br>
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
        </div>


        <div class=" container-ps4 " style="color: white">
        <h2>PS4</h2>
        </div>

        <div class="d-flex flex-wrap justify-content-center ">
            @foreach($tournoips4 as $tournoi)
            <div class="card ">
                <img src="{{asset($tournoi->image)}}" alt="Avatar" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">{{$tournoi->nom}}</h5>
                    <p class="card-text">{{$tournoi->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <i style="color: #c82333"> Type :</i> {{$tournoi->type}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> Start date :</i> {{$tournoi->date_debut}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> End date :</i> {{$tournoi->date_fin}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> Reward :</i> {{$tournoi->recompense}}</li>

                </ul>
                <div class="card-body">
                    <a href="{{route('update',['id' => $tournoi->id])}}" class="card-link ">Update</a>
                    <a href="{{route('destroy',['id' => $tournoi->id])}}" class="card-link btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>




    <div class="container">
        <div class="justify-content-center bg-dark " style="color: white">
            <div class="container-pc ">
                <h2>PC</h2>
            </div>

        </div>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($tournoipc as $tournoi)
                <div class="card ">
                    <img src="{{asset($tournoi->image)}}" alt="Avatar" style="width:100%">
                    <div class="card-body">
                        <h5 class="card-title">{{$tournoi->nom}}</h5>
                        <p class="card-text">{{$tournoi->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <i style="color: #c82333"> Type :</i> {{$tournoi->type}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> Start date :</i> {{$tournoi->date_debut}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> End date :</i> {{$tournoi->date_fin}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> Reward :</i> {{$tournoi->recompense}}</li>

                    </ul>
                    <div class="card-body">
                        <a href="{{route('update',['id' => $tournoi->id])}}" class="card-link ">Update</a>
                        <a href="{{route('destroy',['id' => $tournoi->id])}}" class="card-link btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>



    <div class="container">
        <div class="justify-content-center " style="color: white">
            <div class="container-xbox">
                <h2>XBOX ONE</h2>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($tournoixbox as $tournoi)
            <div class="card ">
                <img src="{{asset($tournoi->image)}}" alt="Avatar" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">{{$tournoi->nom}}</h5>
                    <p class="card-text">{{$tournoi->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <i style="color: #c82333"> Type :</i> {{$tournoi->type}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> Start date :</i> {{$tournoi->date_debut}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> End date :</i> {{$tournoi->date_fin}}</li>
                    <li class="list-group-item"> <i style="color: #c82333"> Reward :</i> {{$tournoi->recompense}}</li>

                </ul>
                <div class="card-body">
                    <a href="{{route('update',['id' => $tournoi->id])}}" class="card-link">Update</a>
                    <a href="{{route('destroy',['id' => $tournoi->id])}}" class="card-link btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="container">
        <div class="justify-content-center " style="color: white">
            <div class="container-mobile">
                <h2>MOBILE</h2>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($tournoimobile as $tournoi)
                <div class="card ">
                    <img src="{{asset($tournoi->image)}}" alt="Avatar" style="width:100%">
                    <div class="card-body">
                        <h5 class="card-title">{{$tournoi->nom}}</h5>
                        <p class="card-text">{{$tournoi->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <i style="color: #c82333"> Type :</i> {{$tournoi->type}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> Start date :</i> {{$tournoi->date_debut}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> End date :</i> {{$tournoi->date_fin}}</li>
                        <li class="list-group-item"> <i style="color: #c82333"> Reward :</i> {{$tournoi->recompense}}</li>

                    </ul>
                    <div class="card-body">
                        <a href="{{route('update',['id' => $tournoi->id])}}" class="card-link ">Update</a>
                        <a href="{{route('destroy',['id' => $tournoi->id])}}" class="card-link btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

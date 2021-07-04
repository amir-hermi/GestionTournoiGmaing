
<!DOCTYPE html>
<html>
<head>
    <title>Update Tournament</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    @include('bootstrap')
    <style>
        html, body {
            min-height: 100%;
            background:  #e1e1ea
;
        }
        body, div, form, input, select, textarea, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }
        h1 {
            position: absolute;
            margin: 0;
            font-size: 32px;
            color: #fff;
            z-index: 2;
        }
        .testbox {
            justify-content: center;
            align-items: center;
            height: inherit;
            width: 60rem;
            padding: 20px;
            margin-left: 25rem;
        }
        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 20px 0 #a82877;
        }
        .banner {
            position: relative;
            height: 210px;
            background-image: url("{{asset('images/banner/ea.jpg')}}");      background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            width: 100%;
            height: 100%;
        }
        input, textarea, select {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input {
            width: calc(100% - 10px);
            padding: 5px;
        }
        select {
            width: 100%;
            padding: 7px 0;
            background: transparent;
        }
        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }
        .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
            color: #a82877;
        }
        .item input:hover, .item select:hover, .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 6px 0 #a82877;
            color: #a82877;
        }
        .item {
            position: relative;
            margin: 10px 0;
        }
        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }
        .item i, input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            margin-right: 2rem;
            font-size: 20px;
            color: #a9a9a9;
        }
        .item i {
            right: 1%;
            top: 30px;
            z-index: 1;
        }
        [type="date"]::-webkit-calendar-picker-indicator {
            right: 0;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }
        input[type="time"]::-webkit-inner-spin-button {
            margin: 2px 22px 0 0;
        }
        input[type=radio], input.other {
            display: none;
        }
        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 10px 0;
            cursor: pointer;
        }
        .question span {
            margin-left: 30px;
        }
        label.radio:before {
            content: "";
            position: absolute;
            top: 2px;
            left: 0;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }
        #radio_5:checked ~ input.other {
            display: block;
        }
        input[type=radio]:checked + label.radio:before {
            border: 2px solid #a82877;
            background: #a82877;
        }
        label.radio:after {
            content: "";
            position: absolute;
            top: 7px;
            left: 5px;
            width: 7px;
            height: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }
        input[type=radio]:checked + label:after {
            opacity: 1;
        }
        .btn-block {
            margin-top: 10px;
            text-align: center;
        }
        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #a82877;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background: #bf1e81;
        }
        @media (min-width: 568px) {
            .name-item, .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .name-item input, .city-item input {
                width: calc(50% - 20px);
            }
            .city-item select {
                width: calc(50% - 8px);
            }
        }
    </style>
</head>
<body>
<div class="testbox justify-content-center">
    <form action="{{route('update.store',['id'=>$tournoi->id])}}" method="POST" enctype="multipart/form-data">
        <div class="banner">
            <h1>Update : {{$tournoi->nom}}</h1>
        </div>
        @csrf
        <div class="form-group">
            <div class="results">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="col align-self-center">
                <div class="form-group item">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$tournoi->nom}}">
                    <span class="text-danger">@error('name'){{ $message }}  @enderror</span>
                </div>
                <div class="custom-file item">
                    <label class="custom-file-label" >Select photo</label>
                    <input type="file" class="custom-file-input" id="photo" name="photo" value="{{$tournoi->image}}">
                    <span class="text-danger">@error('photo'){{ $message }}  @enderror</span>
                </div>
                <br>
                <div class="form-group item">
                    <label for="exampleFormControlTextarea1 ">Description</label>
                    <textarea class="form-control" id="description" name="description"  value="{{$tournoi->description}}"></textarea>
                    <span class="text-danger">@error('description'){{ $message }}  @enderror</span>
                </div>
                <div class="form-group item">
                    <label for="exampleFormControlInput1">type</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="{{$tournoi->type}}">
                    <span class="text-danger">@error('type'){{ $message }}  @enderror</span>
                </div>
                <div class="form-group item">
                    <label for="exampleFormControlInput1">Reward</label>
                    <input type="text" class="form-control" id="reward" name="reward" placeholder="Reward" value="{{$tournoi->recompense}}"/>
                    <span class="text-danger">@error('reward'){{ $message }}  @enderror</span>
                </div>
                <div class="form-group item">
                    <label for="exampleFormControlInput1">Start Date</label>
                    <input type="date" class="form-control" id="startdate" name="startdate" placeholder="Start Date" value="{{$tournoi->date_debut}}"/>
                    <i class="fas fa-calendar-alt"></i>
                    <span class="text-danger">@error('startdate'){{ $message }}  @enderror</span>
                </div>
                <div class="form-group item">
                    <label for="exampleFormControlInput1">End Date</label>
                    <input type="date" class="form-control" id="enddate" name="enddate" placeholder="End Date" value="{{$tournoi->date_fin}}"/>
                    <i class="fas fa-calendar-alt"></i>
                    <span class="text-danger">@error('enddate'){{ $message }}  @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Select Game</label>
                    <select class="form-control " aria-label=".form-select-lg " name="game" value="{{$tournoi->id_game}}">
                        <option selected></option>
                        <option value="1">Valorant</option>
                        <option value="3">COD Warzon -- PC</option>
                        <option value="4">COD Warzon -- PS4</option>
                        <option value="5">COD Warzon -- XBOX</option>
                        <option value="6">Fortnite -- PC</option>
                        <option value="7">Fortnite -- PS4</option>
                        <option value="8">Free Fire -- MOBILE</option>
                        <option value="9">Clash Royale -- MOBILE</option>
                        <option value="10">PUBG -- MOBILE</option>
                        <option value="11">PUBG -- PC</option>
                        <option value="12">Fifa 21 -- XBOX</option>
                        <option value="13">Fifa 21 -- PS4</option>
                        <option value="14">Apex Legends -- PS4</option>
                        <option value="15">Apex Legends -- XBOX</option>
                        <option value="16">Apex Legends -- PC</option>
                    </select>
                    <span class="text-danger">@error('game'){{ $message }}  @enderror</span>
                </div>
                <button type="submit" class=" btn-block ">Submit</button>
                <a href="{{route('tournaments')}}" class="btn btn-outline-secondary btn-block ">All toutnaments</a>
        </div>
    </form>
</div>
</body>
</html>

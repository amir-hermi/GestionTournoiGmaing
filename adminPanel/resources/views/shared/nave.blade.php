<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color : #f0f0f5;
}

.ulNav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 15%;
  background-color:  #1f1f2e;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #f1f1f1;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #d1d1e0;
  color: #000066;
}

li a:hover:not(.active) {
  background-color: #010977;
  color: white;
}
.li_danger{
  color : red;
}
.li a:hover:not(.active){
  background-color: #b32400;
}
</style>
</head>
<body>

<ul class='ulNav'>
  <li><a class="active">Dashboard</a></li>
  <li><a href="{{route('tournaments')}}">Tournaments</a></li>
  <li><a href="{{route('users')}}">Users</a></li>
  <li><a href="{{route('participation')}}">Participation</a></li>
  <li class="li_danger li a:hover:not(.active) "><a href="{{route('logout')}}">LogOut</a></li>
</ul>
</body>

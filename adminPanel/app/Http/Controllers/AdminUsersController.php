<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminUsersController extends Controller
{
public function userList(){
    $users = DB::table('utilisateurs')
        ->select('*')
        ->get();
    return view('shared.usersList',compact('users'));
}
public function destroyUser($id){
    $users = DB::table('utilisateurs')
    ->where('id','=',$id)
    ->delete();
    return redirect()->route('users')->with('success','User Deleted');

}
}

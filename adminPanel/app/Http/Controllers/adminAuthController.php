<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use  App\Models\admin;


class adminAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }



    function check(Request $request ){
      $request->validate([
         'email'=>'required|email',
           'password'=>'required'
       ]);

       $Admin = new admin;
       $Admin = admin::where('email','=',$request->email)->first();
       if($Admin){
          if($request->password == $Admin->mot_de_passe){
              $request->session()->put('LoggedAdmin',$Admin->id);
              return redirect('tournaments');

           }else{
              return back()->with('fail','Invalid password');
          }
       }else{
           return back()->with('fail','no account found');
       }

      /* if (!auth()->attempt(["email"=>$request->email,
       "password"=>$request->password]))
       {
        return back()->with('fail','invalid data');
       }
       else{
        return redirect('tournaments');
       }*/
    }
    function profile(){

       if(session()->has('LoggedAdmin',)){
        $Admin = admin::where('id','=',session('LoggedAdmin'))->first();
        $data=[
            'LoggedAdminInfo'=>$Admin
        ];
        return view('profile',$data);
       }
    }


    function logout(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('/');
        }
    }
}

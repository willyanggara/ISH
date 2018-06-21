<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;

class MainController extends Controller
{
    function admin(){
      return view('login');
    }

    function checklogin(Request $request){
      $this -> validate($request, [
            'username'      =>    'required',
            'password'      =>    'required|alphanum|min:3',
      ]);

      $user_data = array(
        'username'    => $request->get('username'),
        'password'    => $request->get('password')
      );

      if(Auth::attempt($user_data)){
          return redirect('dashboard');
      }else{
        return back()->with('error','username atau password salah');
      }

    }

    function successlogin(){
      return view('dashboard');
    }

    function logout(){
      Auth::logout();
      return view('login');
    }
}

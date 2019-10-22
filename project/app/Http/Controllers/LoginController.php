<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class LoginController extends Controller
{
   
   public function login(Request $request)
   {   

    //dd($request->all())  ;
         $this->validate($request, [
        'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ]);

   		if(Auth::attempt([
   			'email'=>$request->email,
   			'password'=>$request->password,
   		]))
   		{
        
   			$user = User::where('email',$request->email)->first();
   			if($user->is_admin())
   			{
   				return redirect()->route('dashboard');
   			}
   			return redirect()->route('home');
   		}
      else{
     
   		return redirect()->back()->withErrors([
        'approve' => 'Wrong password or Email',
    ]);
    }
   }

   public function redirect(Request $request)
   {  
      
      $user = Auth::user();
            if($user->is_admin())
            {
               return redirect()->route('dashboard');
            }
            return redirect()->route('home');
         
         return redirect()->back();

   }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminCreateController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
    	return view('Admin_create');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
            $this->validate(request(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'verification' => ['required'],
      ]);
            $data = array (
              'email' => $request->email,
              'password' => $request->password,
            );
            
           
            $user = new User();
            $insertArray = [

               "name" => $request['name'],
                "email" =>$request['email'],
               "password" =>  Hash::make($request['password'])

            ];

            if($request['verification'])
                // dd("here");
                $insertArray['email_verified_at'] = date('Y-m-d h:i:s');
            // dump($insertArray);
            $ins = $user->create($insertArray);
            Mail::send('sendemail',$data, function($message) use ($data)
            {
              $message->from('kabhishek427.ak@gmail.com');
              $message->to($data['email']);
              $message->subject('Faveo Login Credentials');
            });
            
            return redirect()->route('dashboard')->with('message','New User Created');  

            
    
    }
}

<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class ListController extends Controller
{	
	public function view()
	{
    $users = User::where('admin','0')->get();
    return view('user_list')->with('users',$users);
	}
}

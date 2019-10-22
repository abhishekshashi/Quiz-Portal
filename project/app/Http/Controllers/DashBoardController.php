<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Test;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $users = User::where('admin','0')->get();
       $tests = Test::all();

      return view('dashboard')->with('users',$users)->with('tests',$tests);
    }
}

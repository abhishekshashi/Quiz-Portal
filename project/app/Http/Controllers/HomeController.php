<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $tests = Test::all();
        return view('home')->with('tests',$tests);
    
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Empresaa::all();
        $name = "christian";
        /*dd($news);*/
        return View::make('home')->with('name', $name);
        /*return view('home', compact('name'));*/
            /*return view('home');   */
    }



    }

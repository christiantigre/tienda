<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cache;


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
            if(\Auth::user()->is_admin){
            $name = \Auth::user()->name;
                $key = Cache::get('key');
                Cache::forever('key','0');
                Cache::flush(); 
                return view('admin/home',compact('name'));  
            }else{
                
                \Auth::logout();
                return abort(404);
            } 
    }



    }

<?php

/**
 * CLC 2
 * HomeController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-1-2018
 * Controls the flow of the home view
 *
 */


namespace App\Http\Controllers;

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
       
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    

}

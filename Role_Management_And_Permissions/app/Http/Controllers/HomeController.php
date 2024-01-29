<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function redirectAdmin(){
        return redirect()->route('admin.dashboard');
    }

    public function index(){
        return view('home');
    }
}
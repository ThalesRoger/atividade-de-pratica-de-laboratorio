<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SislabController extends Controller
{

    public function home(){
        return view('home');
    }

    public function principal(){
       return view('principal');

    }
}

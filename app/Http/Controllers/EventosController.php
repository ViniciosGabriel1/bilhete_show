<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    //


    public function index(){

    }


    public function create(): View {
        return view('eventos.create');
    }
}

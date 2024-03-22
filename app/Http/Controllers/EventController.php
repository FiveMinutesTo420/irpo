<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __invoke(Request $request,$slug){
        dd($slug);
    }
}

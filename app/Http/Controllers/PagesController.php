<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage(){
    	return view('home');
    }

    public function biographyPage(){
    	return view('biography');
    }
    public function eventsPage(){
    	return view('events');
    }
}

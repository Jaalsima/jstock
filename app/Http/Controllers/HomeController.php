<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(){
        
        $this->middleware('can:home');
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('home');
    }
}

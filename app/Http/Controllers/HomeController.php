<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        return view('home.home');
    }

    public function about(): View
    {
        return view('home.about');
    }

    public function contact(): View
    {
        return view('home.contact');
    }

    public function blog(): View
    {
        return view('home.blog');
    }

    public function services(): View
    {
        return view('home.services');
    }

    public function terms(): View
    {
        return view('home.terms');
    }

    public function policies(): View
    {
        return view('home.policies');
    }
}

<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Middleware;

class MenuController extends Controller
{
    public function admin(){
        return view('admin.admin');
    }

    public function seller(){
        return view('seller.seller');
    }

    public function guest(){
        return view('guest.guest');
    }
}
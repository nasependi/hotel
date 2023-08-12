<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class Layout extends Controller
{
    public function index(){
        return View('Layout.main');
    }

    public function home(){
        return View('layout.home');
    }

    public function bookings(){
        return View('layout.home');
    }
}

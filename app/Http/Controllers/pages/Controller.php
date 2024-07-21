<?php

namespace App\Http\Controllers\pages;

abstract class Controller
{
    public function index () {
        return view('home');
    }
}

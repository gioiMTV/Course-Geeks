<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index() {
        return view('pages.terms-condition-page');
    }
}

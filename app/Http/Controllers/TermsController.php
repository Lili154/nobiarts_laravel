<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function show()
    {
        return view('front.layout.terms');
    }
    public function offer()
    {
        return view('front.layout.offer');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonbarberController extends Controller
{
    public function index()
    {
        if (request()->user()->hasRole('salon')) {
            return view('salon.index');
        } else {
            return redirect('/');
        }
    }
}

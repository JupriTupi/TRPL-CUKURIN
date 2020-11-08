<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        if (request()->user()->hasRole('customer')) {
            return view('customer.index');
        } else {
            return redirect('/');
        }
    }
}

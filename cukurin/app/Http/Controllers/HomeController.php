<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.index');
        }

        if ($request->user()->hasRole('barber')) {
            return redirect()->route('barber.index');
        }

        if ($request->user()->hasRole('customer')) {
            return redirect()->route('customer.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // this class can only be accessed by authenticated users.
    }

    public function index()
    {


        return view('dashboard');
    }
}

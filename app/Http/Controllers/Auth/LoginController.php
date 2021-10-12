<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']); // this class can only be accessed by unauthenticated users.
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $request->validate([
            'username' => 'required',
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('username','password'),$request->remember))//signing the user in, returns boolean value
        {
            return back()->with('status','Invalid Credentials. Please check your username and password again.');
        }
        return redirect()->route('dashboard');
    }
}

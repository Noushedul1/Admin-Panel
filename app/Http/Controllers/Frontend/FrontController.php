<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    // start for frontend user
    public function registerShow() {
        return view('frontend.auth.register');
    }
    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:fronts|email',
            'password'=>'required|confirmed'
        ]);
        Front::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        if(Auth::attempt($request->only('email','password'))) {
            return redirect('/');
        }
        return redirect()->route('registerShow');
    }

    public function index() {
        return view('frontend.auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($request->only('email','password'))) {
            return redirect('/');
        }
        return redirect()->route('user.login');
    }
    // end for frontend user
}

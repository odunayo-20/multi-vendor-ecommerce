<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function register()
    {
        return view('frontend.Auth.register');
    }

    public function registerSave(Request $request) {}
    public function login()
    {
        return view('frontend.Auth.login');
    }

    public function loginConfirm(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard(  'buyer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route(name: 'buyer.dashboard'));
        } else {
            session()->flash('error', 'Invalid Credentials');
            return redirect(route('buyer.login'));
        }
    }

    public function logout(){
        Auth::guard(name: 'buyer')->logout();
       return redirect(route(name: 'buyer.login'));
    }


    public function dashboard(){
        // dd("dnklmnsdnls");
        return view('frontend.Dashboard');
    }
}

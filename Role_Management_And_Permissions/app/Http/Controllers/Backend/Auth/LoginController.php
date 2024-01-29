<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
  
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function showLoginForm(){
        return view('backend.auth.login');
    }

    public function login(Request $request){
        
        // Validate Login Data
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);

        // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to dashboard
            session()->flash('success', 'Successully Logged in !');
            return redirect()->intended(route('admin.dashboard'));
        } else {
            // Search using username 
            if (Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password])) {
                session()->flash('success', 'Successully Logged in !');
                return redirect()->intended(route('admin.dashboard'));
            }
            // error
            session()->flash('error', 'Invalid email and password');
            return back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

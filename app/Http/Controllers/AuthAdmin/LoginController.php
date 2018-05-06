<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'Adminlogout']);
    }

   
    public function showLoginForm()
    {
        return view('authAdmin.login');
    }

  
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt($credential, $request->remember)){
            // If login succesful, then redirect to their intended location
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function Adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
        
    }
}

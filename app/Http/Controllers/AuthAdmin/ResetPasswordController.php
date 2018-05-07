<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    

    use ResetsPasswords;

    protected $redirectTo = '/admin';

    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function broker()
    {
        return password::broker('admins');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('authAdmin.passwords.reset')->with(
            ['token'=>$token, 'email'=>$request->email]
        );
    }
}

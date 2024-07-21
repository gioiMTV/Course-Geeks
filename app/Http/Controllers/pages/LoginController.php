<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\users\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function login()
    {
        $title = "Login | Geeks";
        $headerLogin = true;
        return view('pages.login', compact('title', 'headerLogin'));
    }

    public function handleLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Username or email is required',
            'password.required' => 'Password is required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'msg' => 'An error occurred',
                'alert-type' => 'danger'
            ]);
        } else {
            // Attempt login with email or username
            $remember = $request->has('rememberme');
            if (
                Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)
                || Auth::attempt(['username' => $request->email, 'password' => $request->password], $remember)
            ) {
                // session()->put('role', Auth::user()->role);
                session(['role' => Auth::user()->role]);
                // dd(session('role'));

                // Check email verification
                if (Auth::user()->verify_token !== null) {
                    $verifyToken = Auth::user()->verify_token;
                    Auth::logout();
                    return redirect()->route('verify', ['token' => $verifyToken])->withInput()->with([
                        'msg' => 'Email verification is required',
                        'alert-type' => 'warning'
                    ]);
                }


                // Check user role and redirect accordingly
                if (Auth::user()->role === 2) {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->back()->withInput()->with([
                    'msg' => 'Wrong login information',
                    'alert-type' => 'danger'
                ]);
            }
        }
    }

    // Forget password reset
    public function forget()
    {
        $title = "Forgot Password | Geeks";
        $headerLogin = true;
        return view('pages.forget-password', compact('title', 'headerLogin'));
    }

    public function handleForgetPassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'msg' => 'An error occurred',
                'alert-type' => 'danger'
            ]);
        } else {
            // Check if user exists with given email
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $password = Str::random(7);
                $user->update(['password' => $password]);

                // Send email with reset link
                $details = [
                    'title' => 'Reset Password',
                    'user' => $user,
                    'password' => $password
                ];
                Mail::to($user->email)->send(new ResetPassword($details));

                return redirect()->route('login')->withInput()->with([
                    'msg' => 'Password reset has been sent to your email',
                    'alert-type' => 'success'
                ]);
            } else {
                return redirect()->back()->withInput()->with([
                    'msg' => 'Email not found',
                    'alert-type' => 'danger'
                ]);
            }
        }
    }

    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'msg' => 'Logout successfully',
            'alert-type' => 'success'
        ]);
    }
}

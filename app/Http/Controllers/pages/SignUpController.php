<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\users\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SignUpController extends Controller
{
    public function signup()
    {
        $title = 'Sign up | Geeks';
        $header = true;
        return view('pages.signup', compact('title', 'header'));
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validate = Validator::make(
            $request->all(),
            [
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'min:3'],
                'role' => ['required', 'not_in:""'],
                'term' => ['required'],
            ],
            [
                'username.required' => 'Name is required',
                'username.string' => 'Name must be a string',
                'username.max' => 'Name is too long',
                'username.unique' => 'Username already exists',

                'email.required' => 'Email is required',
                'email.string' => 'Email must be a string',
                'email.email' => 'Email must be a valid email',
                'email.max' => 'Email is too long',
                'email.unique' => 'Email already exists',

                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 3 characters long',

                'role.required' => 'You must select a role.',
                'role.not_in' => 'You must select a role',

                'term.required' => 'You must agree before submitting.',


            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'msg' => 'An error occurred',
                'alert-type' => 'danger'
            ]);
        } else {

            // Create a new user
            $user = UserModel::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'verify_token' => Str::random(32),
            ]);
            // Send verification email
            $details = [
                'username' => $request->username,
                'url' => route('send', ['token' => $user->verify_token]),
                'title' => 'Verification',
                'user' => $user,
            ];

            Mail::to($user->email)->send(new VerifyMail($details));

            return redirect()->route('login')->with([
                'msg' => 'Verification email sent!',
                'alert-type' => 'success'
            ]);
        }
    }
}

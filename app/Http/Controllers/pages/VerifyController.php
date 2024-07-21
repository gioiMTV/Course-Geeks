<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Models\User;

class VerifyController extends Controller
{
    public function verify($token)
    {
        $title = "Verification Gmail";
        $headerLogin = true;
        return view('pages.verify', compact('title', 'token', 'headerLogin'));
    }
    public function send($token)
    {
        $user = User::where('verify_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verify_token = null;
            $user->save();

            return redirect(route('login'))->with([
                'msg' => 'Email verified successfully!',
                'alert-type' => 'success'
            ]);
        }

        return redirect(route('login'))->with([
            'msg' => 'Invalid verification token!',
            'alert-type' => 'danger'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Illuminate\Routing\UrlGenerator;



class ForgotPasswordController extends Controller
{
     /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return response()->json(['status' => $status]);
        
    }


    

    

}




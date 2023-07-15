<?php

namespace App\Http\Controllers;
// use App\Notifications\MailResetPasswordNotification;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;
use App\Notifications\ResetPasswordCodeNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class ForgotPasswordController extends Controller
{
   
  
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
    
        $code = rand(100000, 999999);
    
        $userEmail = $request->input('email');
         
        // Save the code to the user's record in the database if needed
        // You can store it in a separate column, or simply send it via email without saving it
          // Save the code to the user's record in the database
          DB::table('users')
          ->where('email', $userEmail)
          ->update(['code' => $code]);

    
        // Send the notification email
        Notification::route('mail', $userEmail)->notify(new ResetPasswordCodeNotification($code));
    
        return response()->json(['message' => 'Code sent.', 'code' => $code]);
    }
    }
    

    

    





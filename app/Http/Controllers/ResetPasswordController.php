<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'code' => 'required',
            'password' => 'required|confirmed|min:2',
        ]);
       
         // Fetch the user by their email address
         $user = DB::table('users')->where('email', $request->input('email'))->first();

       
         if (!$user || $user->code !== $request->input('code')) {
            return response()->json(['error' => 'Invalid code.'], 422);
        }

             // Update the password in the database
             DB::table('users')->where('email', $request->input('email'))->update([
                'password' => Hash::make($request->input('password')),
                'code' => null, // Clear the code after successful password reset
            ]);
 
         // Return a response indicating successful password reset
         return response()->json(['message' => 'Password reset successful.']);
}
}

<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Password;
// use Symfony\Component\Mime\Message;
use Illuminate\Mail\Message;
// use Illuminate\Support\Facades\Password;
// use Illuminate\Routing\UrlGenerator;
class ForgotPasswordController extends Controller
{
    

// public function sendResetLinkEmail(Request $request)
// {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink($request->only('email'));

//     if ($status === Password::RESET_LINK_SENT) {
//         return response()->json(['message' => 'Password reset link sent.']);
//     }

//     return response()->json(['message' => 'Unable to send password reset link.'], 422);
// }


public function sendResetLinkEmail(Request $request, UrlGenerator $urlGenerator)
{
    $request->validate(['email' => 'required|email']);

    $resetUrl = $urlGenerator->to('/reset_password'); // Generate the reset password URL

    $status = Password::sendResetLink($request->only('email'), function (Message $message) use ($resetUrl) {
        $message->subject('Reset Your Password');
        $message->line('Click the button below to reset your password:');
        $message->action('Reset Password', $resetUrl);
    });

    if ($status === Password::RESET_LINK_SENT) {
        return response()->json(['message' => 'Password reset link sent.', 'reset_url' => $resetUrl], 200);
    }

    return response()->json(['message' => 'Unable to send password reset link.'], 422);
}




}


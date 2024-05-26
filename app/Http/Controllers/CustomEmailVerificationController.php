<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

class CustomEmailVerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {

        $id = $request->route('id');
        $hash = $request->route('hash');

        // Retrieve the user associated with the given 'id'
        $user = User::where('user_id', $id)->first();

        $user->markEmailAsVerified();
        event(new Verified($user));
        Mail::to($user->email)->send(new RegistrationMail($user));

        $frontendRedirectUrl = env('APP_DOMAIN') . '/login';
        return Redirect::to($frontendRedirectUrl);
    }

    // public function resend(Request $request)
    // {
    //     $userId = $request->input('user_id');
    //     $user = User::where('user_id', $userId)->first();
    //     $email = $user->email;
    //     if (!$email) {
    //         return response()->json(['error' => 'Email not found'], 404);
    //     }

    //     if ($user->email_verified_at !== null) {
    //         return response()->json(['message' => 'Email already verified'], 200);
    //     }

    //     $user->sendEmailVerificationNotification();

    //     return response()->json(['message' => 'Verification email sent'], 200);
    // }

    // public function checkUserDetail(Request $request)
    // {
    //     $userId = $request->input('user_id');
    //     $user = User::where('user_id', $userId)->first();

    //     $userDetail = UserDetail::where('user_id', $userId)->first();


    //     if ($userDetail) {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Verified'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Not yet verified'
    //         ]);
    //     }
    // }
}

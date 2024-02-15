<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Pin;
use Illuminate\Support\Facades\Hash;



class ForgotController extends Controller
{
    public function showForgotForm()
{
    // This method returns the view for the forgot password form.
    return view('v1.index.admin.auth.forgot-password');
}




public function sendMail(Request $request)
{
    // Validation of the request parameters
    $request->validate([
        'email'=>'required|email|exists:admins,email'
    ]);

    // Generating a random PIN
    $pin = Str::random(6);
    $body = "verify code:";

    // Storing the generated PIN in the database
    $pins = Pin::Insert([
        'email'=>$request->email,
        'pin' => $pin,
    ]);

    // Extracting the email address from the request
    $req = $request->email;

    // Sending an email with the PIN
    Mail::send('v1.index.admin.auth.email', ['pin' => $pin, 'body' => $body], function ($message) use ($request) {
        $message->from('test@example.com', 'Your App');
        $message->to($request->email, 'Your Name')->subject('Reset Password');
    });

    // Returning the view for verifying the code with success message
    return view('v1.index.admin.auth.verify-code',compact(['pin' , 'req']))->with('error','موفقیت آمیز');
}





public function verifyCode(Request $request)
{
    // Validation of the request parameters
    $request->validate([
        'code' => 'required'
    ]);

    // Retrieving the PIN associated with the provided email
    $pins = Pin::where('email', $request->email)->first();
    $pin = $pins->pin;
    $req = $pins->email;

    // Checking if a PIN exists for the given email
    if ($pin != null) {
        // Verifying if the provided code matches the PIN
        if ($request->code == $pin) {
            // Generating a new random password
            $pass = Str::random(14);
            $body = "password:";

            // Sending an email with the new password
            Mail::send('v1.index.admin.auth.email', ['pin' => $pass, 'body' => $body], function ($message) use ($request) {
                $message->from('test@example.com', 'Your App');
                $message->to($request->email, 'Your Name')->subject('Reset Password');
            });

            // Updating the admin's password
            $admin = Admin::where('email', $request->email)->first();
            $admin->password = Hash::make($pass);
            $admin->save();

            // Deleting the PIN from the database
            $row = Pin::where('email', $request->email)->delete();

            // Redirecting to the login page with success message
            return view('v1.index.admin.auth.login')->with('error','موفقیت آمیز');
        } else {
            // If verification fails, returning to the verification page with an error message
            return view('v1.index.admin.auth.verify-code',compact(['pin' , 'req']))->with('error','موفقیت آمیز');
        } 
    }   
}

    
}

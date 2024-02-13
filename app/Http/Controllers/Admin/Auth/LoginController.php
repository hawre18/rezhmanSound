<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;

class LoginController extends Controller
{
    public function Index()
    {
        return view('v1.index.admin.auth.login');
    }

    public function Login(Request $request)
    {
        $check=$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']])){
            return redirect()->route('admin.dashboard')->with('error','موفقیت آمیز');
        }
        else{
            return back()->with('error','ناموفق');
        }
        //return view('v1.index.admin.auth.login');
    }
    public function Logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showForgotForm()
    {
        return view('v1.index.admin.auth.forgot-password');
    }

    public function sendLink(Request $request)
    {
        $request->validate([
           'email'=>'required|email|exists:admins,email'
        ]);
        $token=\Illuminate\Support\Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),
        ]);
        $action_link=route('reset-password-form',['token'=>$token,'email'=>$request->email]);
        $body="this is a test";
        Mail::send('v1.index.admin.auth.reset-password',['action_link'=>$action_link,'body'=>$body],function ($message)use($request){
           $message->from('test@example.com','your app');
           $message->to($request->email,'yourname')->subject('reset password');
        });
        return back()->with('message','success');

    }


}

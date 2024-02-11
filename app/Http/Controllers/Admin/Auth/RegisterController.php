<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Admin;

class RegisterController extends Controller
{
    public function Register()
    {
        return view('v1.index.admin.auth.register');
    }
    public function Registertion(Request $request): RedirectResponse
    {
        $request->validate([
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required', 'string', 'max:255'],
            'UserName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $admin = Admin::Insert([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'UserName' => $request->UserName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
    }
}

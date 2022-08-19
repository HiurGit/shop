<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
      return view('backend.admin.dashboard');
    }
    public function login()
    {
      return view('backend.admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            $user = Auth::user();
            if(!$user->is_active){
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được kích hoạt',
                ]);
            }
            return redirect()->intended('admin');



        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function show_signup_form()
    {
        return view('backend.admin.register');

    }
    public function process_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role_id' => '1',
        ]);

        session()->flash('message', 'Your account is created');

        return redirect()->route('admin.login');

    }

}

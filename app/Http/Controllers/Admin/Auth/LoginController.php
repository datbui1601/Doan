<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (\auth()->user()->role_id == 1)
                return redirect()->intended('/admin/');
            elseif (\auth()->user()->role_id == 3) {
                return redirect()->route('staff.dashboard');
            } else
                return redirect()->route('home');
        }
        return redirect()
            ->back()
            ->withErrors(['login' => 'Login fail! Please information'])
            ->withInput();
    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'user_name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = User::insertGetId([
            'name' => $request->user_name,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role_id' => 2,
            'email' => $request->email,
        ]);

        Auth::loginUsingId($id);

        return redirect()->back()->with('success', 'Đăng ký thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}

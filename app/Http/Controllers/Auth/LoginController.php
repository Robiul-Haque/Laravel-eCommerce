<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $creds = $request->except('_token');
        if (Auth::attempt($creds)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashbord');
            } else {
                return redirect()->route('home');
            }
        } else {
            Session::flash('loginMessage', 'User or password incorrect');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPasswordIndex()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $req)
    {
        $req->validate([
            'email' => 'required|email'
        ]);
        if (User::where('email', '=', $req->email)->first()) {
            $data = [
                'email' => $req->input('email'),
                'token' => Str::random(50)
            ];
            ResetPassword::create([
                'email' => $data['email'],
                'token' => $data['token']
            ]);
            Mail::send('auth.email', $data, function ($message) use ($data) {
                $message->from('maitfirm22@gmail.com', 'MaItFirm');
                $message->to($data['email']);
                $message->subject('Forgot password');
            });
            Session::flash('forgotPassMessage', 'We send a verification link in your email, please check your email.');
            return redirect()->back();
        } else {
            Toastr::error('Account not found!', '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('forgot.password');
        }
    }

    public function updatePassIndex($token)
    {
        if (ResetPassword::where('token','=',$token)->first()) {
            return view('auth.update_password',compact('token'));
        } else {
            Toastr::error('Your url is invalid!', '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('login');
        }
    }

    public function updatePassword(Request $req, $token)
    {
        $req->validate([
            'password' => 'required|min:5|max:15|confirmed',
        ]);
        $check = ResetPassword::where('token','=',$token)->first();
        if ($check) {
            $userCheck = User::where('email','=',$check->email)->first();
            if ($userCheck) {
                User::find($userCheck->id)->update([
                    'password' => Hash::make($req->input('password'))
                ]);
                ResetPassword::where('email','=',$userCheck->email)->delete();
                Toastr::success('Your password update successful', '', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('login');
            }
        } else {
            Toastr::success('Your url is invalid', '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('login');
        }
    }
}

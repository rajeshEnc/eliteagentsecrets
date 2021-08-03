<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class UserController extends Controller
{
    function login() {
        $data['content'] = \DB::table('login_contents')
                            ->where('id', 1)
                            ->first();
        return view('dashboard.user.login', $data);
    }

    function index() {
        $data['content'] = \DB::table('dashboard_contents')
                            ->where('id', 1)
                            ->first();
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        return view('dashboard.user.home', $data);
    }

    function create(Request $request) {
        // validate form inputs
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:20'
        ]);

        $referral_id = Helper::createReferralID();

        $user = new User();
        $user->email = $request->email;
        $user->entered_code = $request->panel_code;
        $user->reffer_code = $referral_id;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if($save) {
            $creds = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($creds)) {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request) {
        // validate inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:20'
        ],[
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout() {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    function level($level_id) {
        return view('dashboard.user.level');
    }

    function register() {
        $data['content'] = \DB::table('register_contents')
                            ->where('id', 1)
                            ->first();
        $data['texts'] = \DB::table('register_contents')
                            ->where('id', '!=', 1)
                            ->get();
        return view('dashboard.user.register', $data);
    }
}

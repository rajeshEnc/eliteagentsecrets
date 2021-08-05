<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FacebookContent;
use App\Models\DashboardContent;
use App\Models\LoginContent;
use App\Models\RegisterContent;
use App\Models\LevelContent;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class UserController extends Controller
{
    function login() {
        $data['content'] = LoginContent::find(1);
        return view('dashboard.user.login', $data);
    }

    function index() {
        $user = Auth::user();
        $count_feferral = User::where('entered_code', $user->reffer_code)->count();
        $data['max_level'] = Level::where('referrals', '<=', $count_feferral)->orderByDesc('id')->first();
        $data['content'] = DashboardContent::find(1);
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        $data['facebook_link'] = FacebookContent::find(1);
        $data['webinar_link'] = FacebookContent::find(2);
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
        $user = Auth::user();
        $count_feferral = User::where('entered_code', $user->reffer_code)->count();
        $data['max_level'] = Level::where('referrals', '<=', $count_feferral)->orderByDesc('id')->first();
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        $data['level_details'] = Level::find($level_id);
        $data['level_contents'] = LevelContent::where('level_id', $level_id)->get();
        $data['facebook_link'] = FacebookContent::find(1);
        $data['webinar_link'] = FacebookContent::find(2);
        return view('dashboard.user.level', $data);
    }

    function register() {
        $data['content'] = RegisterContent::find(1);
        $data['texts'] = RegisterContent::where('id', '!=', 1)->get();
        return view('dashboard.user.register', $data);
    }
}

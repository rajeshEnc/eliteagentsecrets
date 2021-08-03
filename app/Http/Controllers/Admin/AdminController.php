<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('dashboard.admin.login');
    }

    function home() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        return view('dashboard.admin.home', $data);
    }

    function check(Request $request) {
        // validate inputs
        $request->validate([
            'username' => 'required|exists:admins,username',
            'password' => 'required|min:5|max:20'
        ],[
            'username.exists' => 'This username is not exists.'
        ]);

        $creds = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

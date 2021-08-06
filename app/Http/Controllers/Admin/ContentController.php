<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterContent;
use App\Models\LoginContent;
use App\Models\DashboardContent;
use App\Models\FacebookContent;
use App\Models\LevelContent;
use App\Models\Level;
use App\Models\ReferContent;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    function dashboard() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['content'] = \DB::table('dashboard_contents')
                            ->where('id', 1)
                            ->get();
        return view('dashboard.admin.contents.dashboard', $data);
    }

    function dashboard_save(Request $request) {

        $updating = \DB::table('dashboard_contents')
                    ->where('id', 1)
                    ->update([
                        'page_title' => $request->input('title'),
                        'info_heading' => $request->input('info_title'),
                        'info_alert' => $request->input('info_atext'),
                        'info_tex' => $request->input('info_text')
                    ]);
        return redirect()->route('admin.contents.dashboard')->with('success', 'Data has been saved successfully');
    }

    function login() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['content'] = \DB::table('login_contents')
                            ->where('id', 1)
                            ->first();
        return view('dashboard.admin.contents.login', $data);
    }

    function login_save(Request $request) {
        $updating = \DB::table('login_contents')
                    ->where('id', 1)
                    ->update([
                        'text_one' => $request->input('text_one'),
                        'text_two' => $request->input('text_two'),
                        'text_three' => $request->input('text_three')
                    ]);
        return redirect()->route('admin.contents.login')->with('success', 'Data has been saved successfully');
    }

    function register() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['content'] = \DB::table('register_contents')
                            ->where('id', 1)
                            ->first();
        $data['texts'] = \DB::table('register_contents')
                            ->where('id', '!=', 1)
                            ->get();
        return view('dashboard.admin.contents.register', $data);
    }

    function register_save(Request $request) {
        $updating = \DB::table('register_contents')
                    ->where('id', 1)
                    ->update([
                        'text_one' => $request->input('text_one'),
                        'text_two' => $request->input('text_two'),
                        'text_three' => $request->input('text_three'),
                        'text_four' => $request->input('text_four'),
                        'heading' => $request->input('heading')
                    ]);
        return redirect()->route('admin.contents.register')->with('success', 'Data has been saved successfully');
    }

    function register_add() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        return view('dashboard.admin.contents.register-add', $data);
    }

    function register_add_save(Request $request) {
        $data = new RegisterContent();
        $data->text = $request->text;
        $data->title = $request->title;
        $save = $data->save();

        if($save) {
            return redirect()->route('admin.contents.register')->with('success', 'Data has been added successfully');
        } else {
            return redirect()->back()->with('fail', 'Failed to add data');
        }
    }

    function register_edit($text_id) {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['text'] = \DB::table('register_contents')
                        ->where('id', $text_id)
                        ->first();
        return view('dashboard.admin.contents.register-edit', $data);
    }

    function register_edit_save(Request $request) {
        $updating = \DB::table('register_contents')
                    ->where('id', $request->input('tid'))
                    ->update([
                        'title' => $request->input('title'),
                        'text' => $request->input('text')
                    ]);
        return redirect()->route('admin.contents.register')->with('success', 'Data has been updated successfully');
    }

    function register_delete($id) {
        $deleting = \DB::table('register_contents')
                    ->where('id', $id)
                    ->delete();
        return redirect()->route('admin.contents.register')->with('success', 'Data has been deleted successfully');
    }

    function facebook() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['content'] = \DB::table('facebook_contents')
                            ->where('id', 1)
                            ->first();
        return view('dashboard.admin.contents.facebook', $data);
    }

    function facebook_save(Request $request) {
        $updating = \DB::table('facebook_contents')
                    ->where('id', 1)
                    ->update([
                        'link' => $request->input('facebook_link')
                    ]);
        return redirect()->route('admin.contents.facebook')->with('success', 'Data has been updated successfully');  
    }

    function webinar() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['content'] = \DB::table('facebook_contents')
                            ->where('id', 2)
                            ->first();
        return view('dashboard.admin.contents.webinar', $data);
    }

    function webinar_save(Request $request) {
        $updating = \DB::table('facebook_contents')
                    ->where('id', 2)
                    ->update([
                        'link' => $request->input('webinar_link')
                    ]);
        return redirect()->route('admin.contents.webinar')->with('success', 'Data has been updated successfully');
    }

    function refer() {
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        $data['content'] = ReferContent::find(1);
        return view('dashboard.admin.contents.refer', $data);
    }

    function refer_save(Request $request) {
        $updating = ReferContent::where('id', 1)
                    ->update([
                        'top_text' => $request->input('top_text'),
                        'center_text' => $request->input('center_text'),
                        'bottom_text' => $request->input('bottom_text')
                    ]);
        return redirect()->route('admin.contents.refer')->with('success', 'Data has been updated successfully');
    }
}

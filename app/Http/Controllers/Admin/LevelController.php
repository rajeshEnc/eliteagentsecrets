<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\LevelContent;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    function index() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        return view('dashboard.admin.levels.index', $data);
    }

    function add() {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        return view('dashboard.admin.levels.add', $data);
    }

    function save(Request $request) {
        // validate inputs
        $request->validate([
            'title' => 'required'
        ]);

        $data = new Level();
        $data->title = $request->title;
        $data->heading = $request->heading;
        $data->referrals = $request->referrals;
        $save = $data->save();

        if($save) {
            return redirect()->route('admin.levels')->with('success', 'Data has been inserted successfully');
        } else {
            return redirect()->back()->with('fail', 'Failed to insert data');
        }
    }

    function edit($id) {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['level'] = \DB::table('levels')
                            ->where('id', $id)
                            ->first();
        return view('dashboard.admin.levels.edit', $data);
    }

    function update(Request $request) {
        $request->validate([
            'title' => 'required'
        ]);

        $updating = \DB::table('levels')
                    ->where('id', $request->input('lid'))
                    ->update([
                        'title' => $request->input('title'),
                        'heading' => $request->input('heading'),
                        'referrals' => $request->input('referrals')
                    ]);

        return redirect()->route('admin.levels')->with('success', 'Data has been updated successfully');
    }

    function delete($id) {
        $updating = \DB::table('levels')
                    ->where('id', $id)
                    ->update([
                        'status' => 'D'
                    ]);
        return redirect()->route('admin.levels')->with('success', 'Data has been deleted successfully');
    }

    function level_content($id) {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['level_details'] = \DB::table('levels')
                            ->where('id', $id)
                            ->first();
        $data['level_contents'] = \DB::table('level_contents')
                            ->where('level_id', $id)
                            ->get();
        return view('dashboard.admin.levels.contents', $data);
    }

    function level_content_add($level_id) {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['level_details'] = \DB::table('levels')
                            ->where('id', $level_id)
                            ->first();
        return view('dashboard.admin.levels.contentAdd', $data);
    }

    function level_content_save(Request $request) {
        $data = new LevelContent();
        $data->level_id = $request->level_id;
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->video_link = $request->video_link;
        $data->content = $request->content;
        $save = $data->save();

        if($save) {
            return redirect()->route('admin.level', $request->level_id)->with('success', 'Data has been added successfully');
        } else {
            return redirect()->back()->with('fail', 'Failed to add data');
        }
    }

    function level_content_edit($level_id, $content_id) {
        $data['levels'] = \DB::table('levels')
                            ->where('status', '!=', 'D')
                            ->get();
        $data['level_details'] = \DB::table('levels')
                            ->where('id', $level_id)
                            ->first();
        $data['content_details'] = \DB::table('level_contents')
                            ->where('id', $content_id)
                            ->first();
        return view('dashboard.admin.levels.content-edit', $data);
    }

    function level_content_update(Request $request) {
        $updating = \DB::table('level_contents')
                    ->where('id', $request->table_id)
                    ->update([
                        'title' => $request->title,
                        'subtitle' => $request->subtitle,
                        'video_link' => $request->video_link,
                        'content' => $request->content,
                    ]);
        return redirect()->route('admin.level', $request->level_id)->with('success', 'Data has been updated successfully');
    }

    function level_content_delete($level_id, $id) {
        $deleting = \DB::table('level_contents')
                    ->where('id', $id)
                    ->delete();
        return redirect()->route('admin.level', $level_id)->with('success', 'Data has been updated successfully');
    }
}

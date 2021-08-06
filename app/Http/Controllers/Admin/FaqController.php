<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Level;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faq::all();
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        return view('dashboard.admin.faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        return view('dashboard.admin.faq.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $data = new Faq();
        $data->question = $request->question;
        $data->answer = $request->answer;

        $save = $data->save();

        if($save) {
            return redirect()->route('admin.contents.faqs')->with('success', 'Data has been added successfully');
        } else {
            return redirect()->back()->with('fail', 'Failed to add data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['faq'] = Faq::find($id);
        $data['levels'] = Level::where('status', '!=', 'D')->get();
        return view('dashboard.admin.faq.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $updating = Faq::where('id', $id)
                    ->update([
                        'question' => $request->input('question'),
                        'answer' => $request->input('answer')
                    ]);
        return redirect()->route('admin.contents.faqs')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleting = Faq::destroy($id);
        return redirect()->route('admin.contents.faqs')->with('success', 'Data has been deleted successfully');
    }

    public function upload(Request $request) {
        $original_name = $request->upload->getClientOriginalName();
        $filename_org = pathinfo($original_name, PATHINFO_FILENAME);
        $ext = $request->upload->getClientOriginalExtension();
        $filename = $filename_org.'_'.time().'.'.$ext;

        $path = 'uploads/';
        $request->upload->move(public_path($path), $filename);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('uploads/'.$filename);
        $message = 'File uploaded successfully';

        $res = "
            <script>
                window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, `$url`, `$message`);
            </script>
        ";
        @header("content-type: text/html; charset=utf-8");

        echo $res;
    }
}

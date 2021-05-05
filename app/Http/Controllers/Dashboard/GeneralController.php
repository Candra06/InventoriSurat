<?php

namespace App\Http\Controllers\Dashboard;

use App\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general = General::first();
        return view('dashboard.setting.general', compact('general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $general)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'logo' => 'file|between:0,2048|mimes:jpeg,jpg,png',
            'favicon' => 'file|between:0,2048|mimes:jpeg,jpg,png'
        ]);

        $data = $request->all();

        if ($request['logo']) {
            Storage::delete($general->logo);
            $filetype = $request->file('logo')->extension();
            $text = Str::random(16) . '.' . $filetype;
            $data['logo'] = Storage::putFileAs('postImage', $request->file('logo'), $text);
        }

        if ($request['favicon']) {
            Storage::delete($general->favicon);
            $filetype = $request->file('favicon')->extension();
            $text = Str::random(16) . '.' . $filetype;
            $data['favicon'] = Storage::putFileAs('postImage', $request->file('favicon'), $text);
        }

        $general->update($data);
        return redirect('/dashboard/settings/general')->with('status', 'General Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        //
    }
}

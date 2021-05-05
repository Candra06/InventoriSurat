<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenu = Submenu::all();
        return view('dashboard.submenu.submenus', compact('submenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('dashboard.submenu.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Submenu::create($request->validate([
            'menu_id' => 'required',
            'submenu' => 'required',
            'url' => 'required',
            'is_active' => 'max:1'
        ]));
        return redirect('/dashboard/managements/submenu')->with('status', 'Submenu Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        $menu = Menu::all();
        return view('dashboard.submenu.edit', compact('menu', 'submenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
        $data = $request->validate([
            'menu_id' => 'required',
            'submenu' => 'required',
            'url' => 'required',
            'is_active' => 'max:1'
        ]);
        $submenu->update($data);
        return redirect('/dashboard/managements/submenu')->with('status', 'Submenu Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return redirect('/dashboard/managements/submenu')->with('status', 'Submenu Deleted');
    }
}

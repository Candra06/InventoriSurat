<?php

namespace App\Http\Controllers\Dashboard;

use App\AccessMenu;
use App\AccessSubmenu;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Role;
use App\Submenu;
use Illuminate\Http\Request;

class RolemenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('dashboard.role.roles', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        $submenu = Submenu::all();
        return view('dashboard.role.create', compact('menu', 'submenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $role = Role::create($request->validate([
            'role' => 'required'
        ]));

        $menus = $request->menu_id;
        $data_menu = [];
        
        foreach ($menus as $menu) {
            $data_menu[] = [
                'role_id' => $role->id,
                'menu_id' => $menu,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        
        AccessMenu::insert($data_menu);

        $submenus = [
            'submenu' => $request->submenu_id,
            'create' => $request->create,
            'edit' => $request->edit,
            'delete' => $request->delete,
            'created_at' => $now,
            'updated_at' => $now
        ];

        $data_submenu = [];

        for ($i=0; $i < count($submenus['submenu']); $i++) { 
            $data_submenu[] = [
                'role_id' => $role->id,
                'submenu_id' => $submenus['submenu'][$i],
                'create' => $submenus['create'][$i],
                'edit' => $submenus['edit'][$i],
                'delete' => $submenus['delete'][$i],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        AccessSubmenu::insert($data_submenu);

        return redirect('/dashboard/managements/role')->with('status', 'Menu Updated');
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
        $role = Role::where('id', $id)->first();
        $menu = Menu::all();
        $submenu = Submenu::all();
        $rolemenu = AccessMenu::where('role_id', $id)->get();
        $rolesubmenu = AccessSubmenu::where('role_id', $id)->get();
        $rolesubmenu_create = AccessSubmenu::where(['role_id' => $id, 'create' => 1])->get();
        $rolesubmenu_edit = AccessSubmenu::where(['role_id' => $id, 'edit' => 1])->get();
        $rolesubmenu_delete = AccessSubmenu::where(['role_id' => $id, 'delete' => 1])->get();
        $menuold = [];
        foreach ($rolemenu as $r) {
            $menuold[] =$r['menu_id'];
        }
        $create = [];
        $edit = [];
        $delete = [];
        $submenuold = [];
        $i = 0;
        foreach ($rolesubmenu as $rs) {
            $submenuold [] = $rs['submenu_id'];
            if(isset($rolesubmenu_create[$i])){
                $create [] = $rolesubmenu_create[$i]['submenu_id'];
            }
            if(isset($rolesubmenu_edit[$i])){
                $edit [] = $rolesubmenu_edit[$i]['submenu_id'];
            }
            if(isset($rolesubmenu_delete[$i])){
                $delete [] = $rolesubmenu_delete[$i]['submenu_id'];
            }
            $i++;
        }
        // return $create;
        return view('dashboard.role.edit', compact('role', 'menu', 'submenu', 'rolemenu', 'rolesubmenu', 'menuold', 'submenuold','create', 'edit', 'delete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'role' => 'required'
        ]);
        $role->update($data);

        $now = date('Y-m-d H:i:s');
        if($request->hide_menu != null){
            $ins = array_diff($request->menu_id, $request->hide_menu);
            $del = array_diff($request->hide_menu, $request->menu_id);
        }else{
            $ins = array_diff($request->menu_id, []);
            $del = array_diff([], $request->menu_id);
        }
            $iarray = [];
            foreach ($ins as $i) {
                $iarray[] =  $i;
                $data = [
                    'role_id' => $role->id,
                    'menu_id' => $i,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
                AccessMenu::create($data);
            }

            $array = [];
            foreach ($del as $d) {
                $array[] = $d;
                $d = [
                    'role_id' => $role->id,
                    'menu_id' => $d
                ];
                AccessMenu::where($d)
                ->delete();
            }
        

        $submenu = $request->submenu_id;
        $create = $request->create;
        $edit = $request->edit;
        $delete = $request->delete;
        $hide_submenu = $request->hide_submenu;
        // $ceksubmeu  
        $menu = 0;
        $cek_menu = 0;
        // return $submenu;
        $submenu = ($submenu == '' ? [] : $submenu);
            $dell = array_diff($request->hide_submenu, $submenu);
            foreach ($dell as $dd) {
                $d = [
                    'role_id' => $role->id,
                    'submenu_id' => $dd
                ];
                AccessSubmenu::where($d)
                ->delete();
            }
        if($submenu != null || $submenu != ''){
            foreach($submenu as $sm){
                $hide_submenu = ($hide_submenu == '' ? [] : $hide_submenu);
                $createvalue = "0";
                $editvalue = "0";
                $deletevalue = "0";
                $submenudata = [
                    'role_id' => $role->id,
                    'submenu_id' => $sm,
                    'create' => $createvalue,
                    'edit' => $editvalue,
                    'delete' => $deletevalue,
                ];
                if(in_array($sm, $hide_submenu)){
                    
                    if($create != null){
                        if(in_array($sm, $create)) {
                            $createvalue = in_array($sm, $create) ? "1" : "0";
                            $submenudata['create'] = $createvalue;
                        }
                        
                    }
                    if($edit != null){
                        if(in_array($sm, $edit)) {
                            $editvalue = in_array($sm, $edit) ? "1" : "0";
                            $submenudata['edit'] = $editvalue;
                        }
                        
                    }
                    if($delete != null){
                        if(in_array($sm, $delete)) {
                            $deletevalue = in_array($sm, $delete) ? "1" : "0";
                            $submenudata['delete'] = $deletevalue;
                        }
                    }
                    $submenudata_where = [
                        'role_id' => $role->id,
                        'submenu_id' => $sm,
                    ];
                    $cek_menu = AccessSubmenu::where($submenudata_where)
                    ->count();
                    
                    if($cek_menu > 0){
                        AccessSubmenu::where(['role_id' => $role->id,
                        'submenu_id' => $sm])
                        ->update([
                            'create' => $createvalue,
                            'edit' => $editvalue,
                            'delete' => $deletevalue,
                            ]);
                    }else{
                        AccessSubmenu::create($submenudata);
                    }
                }else{
                    $createvalue = in_array($sm, $create) ? "1" : "0";
                    $editvalue = in_array($sm, $edit) ? "1" : "0";
                    $deletevalue = in_array($sm, $delete) ? "1" : "0";
                    $submenudata['create'] = $createvalue;
                    $submenudata['edit'] = $editvalue;
                    $submenudata['delete'] = $deletevalue;
                    AccessSubmenu::create($submenudata);
                }
                $menu++;
            }
        }
        // return ['cek_menu' => $cek_menu, 'create' => $create, 'hide_submenu' => $hide_submenu];
        return redirect('/dashboard/managements/role')->with('status', 'Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

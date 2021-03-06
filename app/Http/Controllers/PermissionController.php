<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $this->authorize('show-permission');
        $actions = array (
            '' => 'N/A',
            'create'=>'create',
            'delete'=>'delete',
            'manage'=>'manage',
            'show'=>'show',
            'update'=>'update'
        );
        $models = array (
            '' => 'N/A',
            'address'=>'address',
            'attachment'=>'attachment',
            'contact'=>'contact',
            'donation'=>'donation',
            'email'=>'email',
            'group'=>'group',
            'note'=>'note',
            'permission'=>'permission',
            'phone'=>'phone',
            'registration'=>'registration',
            'relationship'=>'relationship',
            'reservation'=>'reservation',
            'retreat'=>'retreat',
            'role'=>'role',
            'room'=>'room',
            'touchpoint'=>'touchpoint',
            'user'=>'user',
            'website'=>'website'
    
        
        
        );
        if (empty($request->input('term'))) {
            $term = $request->input('action').'-'.$request->input('model');
        } else {
            $term = $request->input('term');
        }
        if (empty($term)) {
            $permissions = \App\Permission::orderBy('name')->get();
        } else {
            $permissions = \App\Permission::orderBy('name')->where('name', 'like', '%'.$term.'%')->get();
        }
        return view('admin.permissions.index', compact('permissions', 'actions', 'models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-permission');
        return view('admin.permissions.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create-permission');
        $permission = new \App\Permission;
        $permission->name= $request->input('name');
        $permission->display_name= $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();
        return Redirect::back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show-permission');
        $permission = \App\Permission::with('roles')->findOrFail($id);
        $roles = \App\Role::orderBy('name')->pluck('name', 'id');
        return view('admin.permissions.show', compact('permission', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update-permission');
        $permission = \App\Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
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
        $this->authorize('update-permission');
        $permission = \App\Permission::findOrFail($request->input('id'));
        $permission->name= $request->input('name');
        $permission->display_name= $request->input('display_name');
        $permission->description= $request->input('description');
        $permission->save();
    
        return Redirect::action('PermissionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-permission');
        \App\Permission::destroy($id);
        return Redirect::action('PermissionController@index');
    }
    
    public function update_roles(Request $request)
    {
        $this->authorize('update-permission');
        $this->authorize('update-role');
        $permission = \App\Permission::findOrFail($request->input('id'));
        $permission->roles()->detach();
        $permission->roles()->sync($request->input('roles'));
    
        return Redirect::action('PermissionController@index');
    }
}

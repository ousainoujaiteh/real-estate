<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Auth;
class RoleController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->role->create_role){
            return redirect()->back();
        }
            $roles = Role::all();
            return view('roles/index', ['roles' => $roles]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->role->create_role){
            return redirect()->back();
        }
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->role->create_role){
            return redirect()->back();
        }

        if($request['view_dashboard'] == null){
            $request['view_dashboard'] = 0;
        }
        if($request['create_user'] == null){
            $request['create_user'] = 0;
        }
        if($request['create_payment'] == null){
            $request['create_payment'] = 0;
        }
        if($request['view_payment'] == null){
            $request['view_payment'] = 0;
        }
        if($request['create_role'] == null){
            $request['create_role'] = 0;
        }
        if($request['view_report'] == null){
            $request['view  _report'] = 0;
        }
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'view_dashboard' => 'boolean',
            'create_user' => 'boolean',
            'create_payment' => 'boolean',
            'view_payment' => 'boolean',
            'create_role' => 'boolean',
            'view_report' => 'boolean',
        ]);
        $role = Role::create($request->all());
        return redirect()->route('roles.index')->with('success' , 'Role created successfully');
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
        if(!Auth::user()->role->create_role){
            return redirect()->back();
        }

        $role = Role::find($id);
        return view('roles/edit', ['role' => $role]);
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
        if(!Auth::user()->role->create_role){
            return redirect()->back();
        }

        if($request['view_dashboard'] == null){
            $request['view_dashboard'] = 0;
        }
        if($request['create_user'] == null){
            $request['create_user'] = 0;
        }
        if($request['create_payment'] == null){
            $request['create_payment'] = 0;
        }
        if($request['view_payment'] == null){
            $request['view_payment'] = 0;
        }
        if($request['create_role'] == 0){
            $request['create_role'] = 0;
        }
        if($request['view_report'] == null){
            $request['view  _report'] = 0;
        }
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'view_dashboard' => 'boolean',
            'create_user' => 'boolean',
            'create_payment' => 'boolean',
            'view_payment' => 'boolean',
            'create_role' => 'boolean',
            'view_report' => 'boolean',
        ]);
        $role = Role::find($id)->update($request->all());
        return redirect()->route('roles.index')->with('success' , 'Role updated successfully');
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

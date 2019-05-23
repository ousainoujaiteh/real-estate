<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
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
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $roles = Role::all();
        return view('users/create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }

        if ($request['active'] == null) {
          # code...
          $request['active'] = 1;
        }

        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);
        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'roles_id' => $request['role_id']
        ]);
        return redirect()->route('users.index')->with('success' , 'User created successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disable($id)
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $user = User::find($id);

        $user->update([
          'active' => '0',
        ]);

        $roles = Role::all();

        return view('users.show', ['user' => $user , 'roles' => $roles]);
    }

    public function enable($id)
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $user = User::find($id);

        $user->update([
          'active' => '1',
        ]);

        $roles = Role::all();

        return view('users.show', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }

        $user = User::find($id);
        $roles = Role::all();
        return view('users.show', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //return ($request->all());

        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $this->validate($request,[
            'fname',
            'lname',
            'roles_id' => 'required'
        ]);

        User::find($id)->update($request->all());

        $user = User::find($id);
        return redirect()->route('users.show',['user' => $user])->with('success' , 'User updated successfully');
    }

    public function change_password(Request $request, $id)
    {
        if(!auth()->user()->role->create_user){
            return redirect()->back();
        }
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::find($id)->update([
            'password' => bcrypt($request['password']),
        ]);

        $user = User::find($id);
        return redirect()->route('users.show',['user' => $user])->with('success' , 'User updated successfully');
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

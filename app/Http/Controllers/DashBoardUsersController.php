<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

class DashBoardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('dashboard.admin.users', compact('users','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        return view('dashboard.admin.choose_user', compact('users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::where('id', '=', $request->user_id)->first();
        $permissions = Permission::all();
        return view('dashboard.admin.alter_user', compact('user', 'permissions'));
        /*
        if($request->permission == "admin"){
            echo("admin");
        }
        else if($request->permission == "user"){
            echo("user");
        }
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $current_permission = User::where('id', '=', $request->id)->value('permission_id');
        $desired_permission = $request->permission_id;
        
        if($current_permission != $desired_permission){
            User::where('id', '=', $request->id)->update(['permission_id' => $desired_permission]);
        }

        if($request->user_delete){
            $this->destroy($request->id);
        }
        
        return Redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

use App\Http\Controllers\Controller;

class UserController extends Controller
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
        return view('dashboard/admin/users', compact('users','permissions'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        return view('dashboard.admin.edit_user', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $desired_name = $request->user_name;
        $desired_email = $request->user_email;
        $desired_permission = $request->desired_permission;

        User::where('id', '=', $user->id)->update(['name' => $desired_name, 'email' => $desired_email, 'permission_id' => $desired_permission]);
        
        return Redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect('dashboard/users');
    }
}

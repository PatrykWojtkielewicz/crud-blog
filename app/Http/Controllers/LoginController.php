<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->submit)){
            $name = $request->user_name;
            $password = $request->user_password;
            
            $user = DB::table('users')->where('name', '=', $name)->first();
            if($user === null){
                echo("Nie ma takiego użytkownika");
            }
            else{
                $hashed_pass = DB::table('users')->where('name', '=', $name)->value('password');
                if(password_verify($password, $hashed_pass)){
                    $user_id = DB::table('users')->where('name', '=', $name)->value('id');
                    session()->put('UserId', $user_id);
                    return Redirect('/');
                }
                else{
                    echo("Nie poprawne hasło");
                }
            }
        }
        else{
            echo("Strona niedostępna");
        }
    }

    public function logout(){
        session()->forget('UserId');
        return Redirect('/');
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
        //
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

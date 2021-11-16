<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class RegisterController extends Controller
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
        return view('auth.registration');
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
            $email = $request->user_email;
            $password = $request->user_password;
            $password = password_hash($password, PASSWORD_DEFAULT);

            //$user = users::where('name', '=', $name)->first();
            $user = DB::table('users')->where('name', '=', $name)->first();
            if($user !== null){
                echo("Nazwa użytkownika nie jest dostępna");
            }

            $user_email = DB::table('users')->where('email', '=', $email)->first();
            if($user_email !== null){
                echo("<br/>Email nie jest dostępny");
            }

            if($user === null && $user_email === null){
                $data = array('name'=>$name, 'email'=>$email, 'password'=>$password, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now());
                DB::table('users')->insert($data);
                return Redirect('/');
            }
        }
        else{
            echo("Strona niedostępna");
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

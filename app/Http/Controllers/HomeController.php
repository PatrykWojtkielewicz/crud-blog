<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $dane=posts::all();
        return view('posts', compact('dane'));
    }
    public function new_post(){
        return view('new_post');
    }
    public function add_post(Request $req){
        $data=array();
        $data['title']=$req->post_title;
        $data['description']=$req->post_content;
        


        $data['image']="abc";
        $data['slug']=Str::slug($req->post_title);
        $data['user_id']=0;
        $data['active']=0;
        $data['created_at']=Carbon::now();
        $data['updated_at']=Carbon::now();
        DB::table('posts')->insert($data);

        return $this->index();
    }
}

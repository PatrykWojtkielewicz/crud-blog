<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','email','password','permission_id'];
    public function permission(){
        return $this->belongsTo(Permission::class);
    }
}

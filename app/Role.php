<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{ 
    protected $table = "roles";

    protected $fillable = [
        'role_title','role_slug',
    ];
    
    public function users()
    {
         return $this->hasMany('App\User');
    }
}

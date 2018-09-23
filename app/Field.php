<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Field extends Model
{
    protected $table = "fields";

    protected $fillable = [
        'title',
    ];
    
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}

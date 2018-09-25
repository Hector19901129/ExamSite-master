<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = "exams";

    protected $fillable = [
        'user_id',
    ];

    public function reports()
    {
        return $this->belongsToMany('App\Report')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

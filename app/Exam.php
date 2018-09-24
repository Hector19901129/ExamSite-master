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
        return $this->belongsToMany('App\Report');
    }
}

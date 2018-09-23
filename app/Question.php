<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Field;

class Question extends Model
{
    protected $table = "questions";

    protected $fillable = [
        'quiz', 'answers', 'right_answer_num', 'multi_option', 'field_id'
    ];

    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}

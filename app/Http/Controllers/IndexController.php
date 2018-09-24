<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Field;

class IndexController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        
        return view('admin/user');
    }
    public function training(){
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(Question::count() * $r);
        $question = Question::where('id', '>=', $random_id)->first();
        $answer_array = explode("\\\\", $question->answers);
        $right_answer_id = explode(",", $question->right_answer_num);
        return view('admin.training', ['question' => $question, 'answer_array' => $answer_array, 'right_answer_id' => $right_answer_id]);
        //return view('admin/training');
    }
    public function exam(){
        $time = env('TIME');
        $quiz_count = env('QUIZ_COUNT');

        return view('admin/exam', ['time' => $time, 'quiz_count' => $quiz_count]);
    }
    public function startExam(){
        $time = env('TIME');
        $quiz_count = env('QUIZ_COUNT');
        $chm_question = Field::find(1)->questions;
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(count($chm_question) * $r);
        $random_id = $chm_question[$random_id]->id;
        $chosen_question = Question::where('id', '=', $random_id)->first();
        $answer_array = explode("\\\\", $chosen_question->answers);
        return view('admin/examstart', ['question' => $chosen_question, 'answer_array' => $answer_array, 'quiz_number' => 1, 'time' => $time]);
    }
    public function showReports(){
        return view('admin/reports');
    }
}
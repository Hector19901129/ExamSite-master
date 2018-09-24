<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
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
        $time = $_ENV['TIME'];
        $quiz_count = $_ENV['QUIZ_COUNT'];
        
        return view('admin/exam');
    }
    public function showReports(){
        return view('admin/reports');
    }
}
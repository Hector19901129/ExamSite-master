<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Field;
use App\Report;
use App\Exam;

class IndexController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        
        return view('admin/user');
    }
    public function training(){
        //push random question
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(Question::count() * $r);
        $question = Question::where('id', '>=', $random_id)->first();
        $answer_array = explode("\\\\", $question->answers);
        $right_answer_id = explode(",", $question->right_answer_num);

        return view('admin.training', ['question' => $question, 'answer_array' => $answer_array, 'right_answer_id' => $right_answer_id]);

    }
    public function exam(){
        $time = env('TIME');
        $quiz_count = env('QUIZ_COUNT');

        return view('admin/exam', ['time' => $time, 'quiz_count' => $quiz_count]);
    }
    public function startExam(){
        //push first question chosen randomly 
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
    public function nextExam(Request $request){

        //get input question id, answer, current number
        $current_num = $request->input('current_num');
        $answer = $request->input('answer');
        $question_id = $request->input('question_id');

        //get right answer, score from question id
        $question = Question::where('id', $question_id)->first();
        $right_answer = Question::where('id', $question_id)->first()->right_answer_num;
        $quiz_count = explode("\\\\", Question::where('id', $question_id)->first()->answers);
        $answer_id = explode(',', $answer);
        $right_answer_id = explode(',', $right_answer);
        $score = 0.0;
        dd($quiz_count);
        for($i = 0; $i < $quiz_count; $i++)
        {
            if((in_array($i + 1, $right_answer_id) && in_array($i + 1, $answer_id)) || (!in_array($i + 1, $right_answer_id) && !in_array($i + 1, $answer_id)))
            {
                $score ++;
            }
            
        }
        dd($quiz_count);
        $score /= $quiz_count;

        //save to reports table, exam table
        $report = new Report;
        $report->question_id = $question_id;
        $report->answer = $answer;
        $report->score = $score;
        $report->save();

        $exam = new Exam;
        dd("22");
        //$exam->user_id = $_SESSION['name']

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
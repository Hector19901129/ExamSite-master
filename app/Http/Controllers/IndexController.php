<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Field;
use App\Report;
use App\Exam;
use App\User;

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
        //save data to exam table
        $exam = new Exam;
        $exam->user_id = User::where('email', \Auth::user()->email)->first()->id;
        $exam->save();

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

        for($i = 0; $i < count($quiz_count) - 1; $i++)
        {
            if((in_array($i + 1, $right_answer_id) && in_array($i + 1, $answer_id)) || (!in_array($i + 1, $right_answer_id) && !in_array($i + 1, $answer_id)))
            {
                $score += 5.0;
            }
        }
        
        $score /= (count($quiz_count) - 1);
        $score = round($score, 2);
        //save to reports table
        $report = new Report;
        $report->question_id = $question_id;
        $report->answer = $answer;
        $report->score = $score;
        $report->save();
        
        //save to exam_report table(pivot table)
        $user_id = User::where('email', \Auth::user()->email)->first()->id;
        $exam = Exam::where('user_id', $user_id)->orderby('created_at', 'desc')->first();
        $exam->reports()->save($report);
        
        //push next quiz
        $time = env('TIME');
        $quiz_count = env('QUIZ_COUNT');

        //if finished, complete exam
        if($quiz_count == $current_num)
        {
            //save average score and not_finished change in exam table
            $aver_score = 0.0;

            $report = $exam->reports()->get();

            for($i = 0; $i < count($report); $i++)
            {
                $aver_score += $report[$i]->score;
            }
            $aver_score /= count($report);
            $aver_score = round($aver_score, 2);
            $result = Exam::where('user_id', $user_id)
                    ->orderby('created_at','desc')
                    ->take(1)
                    ->update(['aver_score' => $aver_score, 'not_finished' => false]);

            return view('admin/examend', ['quiz_count' => $quiz_count, 'aver_score' => $aver_score]);
        }
        //push next question
        $chm_question = Field::find(1)->questions;

        if($current_num > $quiz_count / 2)
        {
            $chm_question = Field::find(2)->questions;
        }
        
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(count($chm_question) * $r);
        $random_id = $chm_question[$random_id]->id;
        $chosen_question = Question::where('id', '=', $random_id)->first();
        $answer_array = explode("\\\\", $chosen_question->answers);
        return view('admin/examstart', ['question' => $chosen_question, 'answer_array' => $answer_array, 'quiz_number' => ($current_num + 1), 'time' => $time]);
    }
    public function showReports()
    {
        return view('admin/reports');
    }
}
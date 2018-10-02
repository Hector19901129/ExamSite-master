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

        $user = User::where('email', \Auth::user()->email)->first();
        $user_id = $user->id;
        $total_score = $user->total_score;
        $exam_count =$user->exam_count;
        $reports = Exam::where('user_id', $user_id)->get();
        $reports_count = count($reports);
        $reports = Exam::where('user_id', $user_id)->take(5)->get();
        return view('admin/user', ['exam_count' => $exam_count, 'total_score' => $total_score, 'reports' => $reports, 'reports_count' => $reports_count]);
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
        $exam->quiz_count = env('QUIZ_COUNT');
        $exam->save();
        
        //increase count of exam in user table
        User::find($exam->user_id)->increment('exam_count');


        //push first question chosen randomly 
        $time = env('TIME');
        $quiz_count = env('QUIZ_COUNT');
        $chm_question = Field::find(1)->questions;
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(count($chm_question) * $r);
        $random_id = $chm_question[$random_id]->id;
        $question = Question::where('id', '=', $random_id);
        $chosen_question = $question->first();
       
        $field = Question::Find($random_id)->field->title;
        $answer_array = explode("\\\\", $chosen_question->answers);



        return view('admin/examstart', ['field' => $field,'question' => $chosen_question, 'answer_array' => $answer_array, 'quiz_number' => 1, 'time' => $time]);
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
            //update total_score in user table


            $user = User::find($user_id);
            $exam_count = $user->exam_count;
            $current_score = $user->total_score;
            $total_score = round((($exam_count - 1) * $current_score + $aver_score) / $exam_count, 2);
            $user->total_score = $total_score;
            $user->save();


            return view('admin/examend', ['quiz_count' => $quiz_count, 'aver_score' => $aver_score]);
        }
        //push next question
        $chm_question = Field::find(1)->questions;

        if($current_num >= $quiz_count / 2)
        {
            $chm_question = Field::find(2)->questions;
        }
        
        $r = mt_rand() / mt_getrandmax();
        $random_id = intval(count($chm_question) * $r);
        $random_id = $chm_question[$random_id]->id;
        $chosen_question = Question::where('id', '=', $random_id)->first();
        $answer_array = explode("\\\\", $chosen_question->answers);
        $field = Question::Find($random_id)->field->title;
        return view('admin/examstart', ['field' => $field, 'question' => $chosen_question, 'answer_array' => $answer_array, 'quiz_number' => ($current_num + 1), 'time' => $time]);
    }
    public function showReports()
    {
        $user = User::where('email', \Auth::user()->email)->first();
        $user_id = $user->id;
        $exam_count = $user->exam_count;
        $total_score = $user->total_score;
        $reports = Exam::where('user_id', $user_id)->get();
        
        return view('admin/reports', ['exam_count' => $exam_count, 'total_score' => $total_score, 'reports' => $reports]);
    }

    public function view(Request $request)
    {
        $user = User::where('email', \Auth::user()->email)->first();
        $user_id = $user->id;
        $created_at = $request->input('created_at');
        $current_num = $request->input('current_num');
        try {
            $exam = Exam::where('user_id', $user_id)->where('created_at', $created_at)->first();
        
            $exam = Exam::where('user_id', $user_id)->where('created_at', $created_at)->first();

            //get reports according user id and created_at using pivot
            $views = $exam->reports()->get();
            $view = $views[$current_num - 1];
            $question_id = $view->question->id;
            $field = Question::find($question_id)->field->title;
            $answer = $view->answer;
            $answer_array = explode(',', $answer);
            $right_answer = $view->question->right_answer_num;
            $right_answer_id = explode(',', $right_answer);
            $question = $view->question;
            $answer = $question->answers;
            $answer_array = explode('\\\\', $answer);
            $your_answer = $view->answer;
            $your_answer_array = explode(',', $your_answer);
            $quiz_count = count($views);
        } catch (\Exception $exception) {
            return view('admin/exception', ["alert" => "This exam have no questions!"]);
        }
        return view('admin/view', ['quiz_count' => $quiz_count, 'created_at' => $created_at, 'question' => $question, 'field' => $field, 'answer_array' => $answer_array, 'right_answer_id' => $right_answer_id, 'current_num' => $current_num, 'your_answer_array' => $your_answer_array]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Question;
use App\Field;

class AdminController extends Controller
{
    //
    public function __construct(){

    }
    public function showStudents(){
        $users = Role::find(2)->users;
        return view('admin/students', ['users' => $users]);
    }
    public function showQuestions(){
        $question = Question::all();
        return view('admin/questions', ['question' => $question]);
    }
    public function showDashboard(){
        $users_count = Role::find(2)->users()->count();
        $questions_count = Question::count();
        $recent_users =  Role::find(2)->users()->orderby('created_at', 'desc')->take(5)->get();
        return view('admin/admin', ['users_count' => $users_count, 'questions_count' => $questions_count, 'recent_users' => $recent_users]);
 
    }
    public function viewQuestion(){
        return view('admin/addquestion');
    }
    public function addQuestion(Request $request){
        
        $title = $request->input( 'title' );
        $answer = $request->input( 'answer' ); 
        $right_answer_num = $request->input( 'right_answer_num' );
        $multi_option = $request->input( 'multi_option' );
        $field = $request->input( 'field' );
        $field_id = Field::where('title', $field)->firstOrFail()->id;
        $question = Question::create(array('quiz' => $title, 'answers' => $answer, 
        'right_answer_num' => $right_answer_num, 'multi_option' => $multi_option, 'field_id' => $field_id));
    }
}

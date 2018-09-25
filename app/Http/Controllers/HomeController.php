<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\Question;
use App\Exam;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->role_id == 1) 
        {
            $users_count = Role::find(2)->users()->count();
            $questions_count = Question::count();
            $recent_users =  Role::find(2)->users()->orderby('created_at', 'desc')->take(5)->get();
            return view('admin/index', ['name' => $request->user()->name, 'role_id' => $request->user()->role_id, 'users_count' => $users_count, 'questions_count' => $questions_count, 'recent_users' => $recent_users]);
        }
        else
        {
            $total_score = $request->user()->total_score;
            $exam_count = $request->user()->exam_count;
            $user_id = $request->user()->id;
            $reports = Exam::where('user_id', $user_id)->get();
            $reports_count = count($reports);
            $reports = Exam::where('user_id', $user_id)->take(5)->get();
            return view('admin/index', ['name' => $request->user()->name, 'role_id' => $request->user()->role_id, 'exam_count' => $exam_count, 'total_score' => $total_score, 'reports' => $reports, 'reports_count' => $reports_count]);
        }


        //return view('home');
    }
}

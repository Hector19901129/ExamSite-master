<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\Question;

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
            $users_count = Role::find(2)->users()->count();
            $questions_count = Question::count();
            $recent_users =  Role::find(2)->users()->orderby('created_at')->take(5);
            return view('admin/index', ['name' => $request->user()->name, 'role_id' => $request->user()->role_id, 'users_count' => $users_count, 'questions_count' => $questions_count, 'recent_users' => $recent_users]);
        }


        //return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        return view('admin/index');
    }
    public function showStudents(){
        return view('admin/students');
    }
    public function showQuestions(){
        return view('admin/questions');
    }
}

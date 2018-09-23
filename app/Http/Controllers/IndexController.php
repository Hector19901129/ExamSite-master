<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        return view('admin/user');
    }
    public function training(){
        return view('admin/training');
    }
    public function exam(){
        return view('admin/exam');
    }
    public function showReports(){
        return view('admin/reports');
    }
}
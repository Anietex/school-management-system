<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{



    public function dashboard(){

        return view("admin.dashboard");
    }

    public function teachers(){
        return view('admin.teachers');
    }

    public function students(){
        return view('admin.students');
    }

    public function classes(){
        return view('admin.classes');
    }


    public function sessions(){
        return view('admin.sessions');
    }


    public function subjectAllocation(){
        return view('admin.subject_allocation');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
    public function index(){
        $students = Students::latest()->paginate(10);
        return view('students.index',compact('students'));
    }
}
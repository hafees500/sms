<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Teachers;
class StudentsController extends Controller
{
    # List all availble Students
    public function index(){
        $students = Students::latest()->paginate(10);
        return view('students.index',compact('students'));
    }
    # Add new Student Form
    public function addStudent(){
        $teachers = Teachers::pluck('name','id');
        return view('students.create',compact('teachers'));
    }
    # Store the add student form data to database
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'age'=>'required',
            'gender'=>'required',
            'reportingTeacher'=>'required',
        ]);

        $task = new Students();
        $task->name = $request->name;
        $task->age = $request->age;
        $task->gender = $request->gender;
        $task->reportingTeacher = $request->reportingTeacher;
        $task->save();
        session()->flash('success', 'Student created successfully');

        return redirect('/students'); 

    }
}

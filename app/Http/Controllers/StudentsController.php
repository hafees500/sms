<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Teachers;

class StudentsController extends Controller
{
    
    # List all availble Students
    public function index()
    {
        $students = Students::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    # Add new Student Form
    public function addStudent()
    {
        # get the the teachers list 
        $teachers = Teachers::pluck('name', 'id');
        return view('students.create', compact('teachers'));
    }

    # Store the add student form data to database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'age' => 'required',
            'gender' => 'required',
            'reportingTeacher' => 'required',
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

    # update form
    public function UpdateStudent($id)
    {
        $student = Students::findOrFail($id);
        $teachers = Teachers::pluck('name', 'id');
        return view('students.update', compact('student', 'teachers'));
    }

    # store update form data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required',
            'gender' => 'required',
            'reportingTeacher' => 'required',
        ]);
        $Students = Students::find($id);
        $Students->name = $request->name;
        $Students->age = $request->age;
        $Students->gender = $request->gender;
        $Students->reportingTeacher = $request->reportingTeacher;
        $Students->save();
        session()->flash('success', 'Student updated successfully');
        return redirect('/students');
    }

    # delete student using primary key
    public function delete($id)
    {
        $Students = Students::find($id);
        $Students->delete();
        session()->flash('success', 'Student deleted successfully');
        return redirect('/students');
    }
}

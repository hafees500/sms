<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marks;
use App\Models\Terms;
use App\Models\Students;
class MarksController extends Controller
{
    # Marks Listing 
    public function index()
    {
        $marks = Marks::latest()->paginate(10);
        return view('marks.index', compact('marks'));
    }

    # Add marks form with terms and students select box
    public function addMarks(){
        $terms = Terms::pluck('name','id');
        $students = Students::pluck('name','id');
        return view('marks.create',['terms'=>$terms,'students'=>$students]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'term' => 'required',
            'student'=>'required',
            'maths'=>'required',
            'science'=>'required',
            'history'=>'required',
        ]);

        $marks = new Marks();
        $marks->term = $request->term;
        $marks->student = $request->student;
        $marks->maths = $request->maths;
        $marks->science = $request->science;
        $marks->history = $request->history;
        $marks->totalMarks=($request->maths+$request->science+$request->history);
        $marks->save();
        session()->flash('success', 'Mark created successfully');

        return redirect('/marks'); 

    }
}

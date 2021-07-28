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

    # store add form 
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

    # update form
    public function updateMark($id){
        $marks = Marks::findOrFail($id);
        $terms = Terms::pluck('name','id');
        $students = Students::pluck('name','id');
        return view('marks.update',['terms'=>$terms,'students'=>$students,'marks'=>$marks]);
    }

    # store update form data
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'term' => 'required',
            'student'=>'required',
            'maths'=>'required',
            'science'=>'required',
            'history'=>'required',
        ]);
        $marks = Marks::find($id);
        $marks->term = $request->term;
        $marks->student = $request->student;
        $marks->maths = $request->maths;
        $marks->science = $request->science;
        $marks->history = $request->history;
        $marks->totalMarks=($request->maths+$request->science+$request->history);
        $marks->save();
        session()->flash('success', 'Mark updated successfully');
        return redirect('/marks'); 
    }

    # delete marks
    public function delete($id){
        $marks = Marks::find($id);
        $marks->delete();
        session()->flash('success', 'Mark deleted successfully');
        return redirect('/marks');
    }

}

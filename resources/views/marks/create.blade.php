@extends('layout.main')
@section('content')
<div class="panel-body">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Add Mark</h3>
        </div>
        <div class="card-body">
            {{ Form::open(array('url' => url('marks/store'),'method' => 'POST','class'=>'form-horizontal')) }}
            <div class="form-group">
                <label for="exampleInputTerm">Term</label>
                {{ Form::select('term', $terms, '', ['id' => 'term','class'=>'form-control','placeholder'=>'Select Term']) }}

                @if ($errors->has('term'))
                <span class="text-danger">{{ $errors->first('term') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputStudent">Student</label>
                {{ Form::select('student', $students, '', ['id' => 'term','class'=>'form-control','placeholder'=>'Select Student']) }}
                @if ($errors->has('student'))
                <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputMaths">Mark In Maths</label>
                {{Form::number('maths', '',['class'=>'form-control','placeholder'=>'Enter Maths Mark'])}}
                @if ($errors->has('maths'))
                <span class="text-danger">{{ $errors->first('maths') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputScience">Mark In Science</label>
                {{Form::number('science', '',['class'=>'form-control','placeholder'=>'Enter Science Mark'])}}
                @if ($errors->has('science'))
                <span class="text-danger">{{ $errors->first('science') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputHistory">Mark In History</label>
                {{Form::number('history', '',['class'=>'form-control','placeholder'=>'Enter History Mark',])}}
                @if ($errors->has('history'))
                <span class="text-danger">{{ $errors->first('history') }}</span>
                @endif
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {{ Form::close() }}
        </div>
    </div>
    @endsection
</div>
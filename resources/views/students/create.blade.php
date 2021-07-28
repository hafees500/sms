@extends('layout.main')
@section('content')
<div class="panel-body">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Create Student</h3>
        </div>
        <div class="card-body">
            {{ Form::open(array('url' => url('students/store'),'method' => 'POST','class'=>'form-horizontal')) }}
            
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                {{Form::text('name', '',['class'=>'form-control','placeholder'=>'Enter Name'])}}
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                {{Form::number('age', '',['class'=>'form-control','placeholder'=>'Enter Age'])}}
                @if ($errors->has('age'))
                <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                {{ Form::select('gender', ['Male'=>'Male','Female'=>'Female'], '', ['id' => 'gender','class'=>'form-control','placeholder'=>'Select Gender']) }}
                @if ($errors->has('gender'))
                <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Reporting Teacher</label>
                {{ Form::select('reportingTeacher', $teachers, '', ['id' => 'teacher','class'=>'form-control','placeholder'=>'Select Teacher']) }}

                @if ($errors->has('reportingTeacher'))
                <span class="text-danger">{{ $errors->first('reportingTeacher') }}</span>
                @endif
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {{ Form::close() }}
        </div>
    </div>
    @endsection
</div>
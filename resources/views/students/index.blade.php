@extends('layout.main')
@section('content')
<div class="panel-body">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Students List</h3>
            <a class="btn btn-success float-right btn-sm" href="{{ url('students/add-student') }}" title="">Add Student</a>
        </div>
        <div class="card-body">
            <div class="container mt-5">
                <table class="table table-bordered table-responsive-lg mb-5">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Reporting Teacher</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($students as $key => $student)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->teacher->name}}</td>
                        <td>{{date("M d, Y h:i A",strtotime($student->created_at))}}</td>
                        <td>
                            <div class="action-button">
                                <form action="{{ url('students/delete',[$student->id]) }}" method="POST">
                                    <a class="btn btn-outline-primary btn-xs" href="{{ url('students/update-student',[$student->id]) }}" title="Edit"><i class="fas fa-edit"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" class="btn btn-outline-danger btn-xs delete-item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $students->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
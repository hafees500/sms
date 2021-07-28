@extends('layout.main')
@section('content')
<div class="panel-body">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Marks List</h3>
            <a class="btn btn-success float-right btn-sm" href="{{ url('marks/add-marks') }}" title="">Add Marks</a>
        </div>
        <div class="card-body">
            <div class="container mt-5">
                <table class="table table-bordered table-responsive-lg">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Term</th>
                        <th>Total Marks</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($marks as $key => $mark)
                    <tr>
                        <td>{{$mark->id}}</td>
                        <td>{{$mark->students->name}}</td>
                        <td>{{$mark->maths}}</td>
                        <td>{{$mark->science}}</td>
                        <td>{{$mark->history}}</td>
                        <td>{{$mark->terms->name}}</td>
                        <td>{{$mark->totalMarks}}</td>
                        <td>{{date("M d, Y h:i A",strtotime($mark->created_at))}}</td>
                        <td>
                            <div class="action-button">
                                <form action="{{ url('marks/delete',[$mark->id]) }}" method="POST">
                                    <a class="btn btn-outline-primary btn-xs" href="{{ url('marks/update-mark',[$mark->id]) }}" title="Edit"><i class="fas fa-edit"></i></a>
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
        </div>
        <div class="d-flex justify-content-center">
            {!! $marks->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
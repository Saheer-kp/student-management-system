@extends('layouts.main')
@section('content')

<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Student Marks</h2>
                
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Student Mark List <span class="float-right"> <a href="/student-marks/create" class="btn btn-primary">Create Student Mark</a></span></h5>
                
                <div class="card-body">
                    @if (Session::has('delete'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             {{ Session::get('delete') }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                        </div>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <th>Name</th>
                                    <th>Maths</th>
                                    <th>Science</th>
                                    <th>History</th>
                                    <th>Term</th>
                                    <th>Total</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marks as $mark)
                                <tr>
                                    <td>{{ $mark->id }}</td>
                                    <td>{{ $mark->student->name }}</td>
                                    <td>{{ $mark->maths }}</td>
                                    <td>{{ $mark->science }}</td>
                                    <td>{{ $mark->history }}</td>
                                    <td>{{ $mark->term }}</td>
                                    <td>{{ $mark->total_mark }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mark->created_at)
                                        ->format('M d , Y h:i a') }}</td>
                                    <td>
                                        <form class="row" method="POST" action="/student-marks/{{$mark->id}}" onsubmit = "return confirm('Are you sure?')">
                   
                                            @csrf
                                            @method('DELETE')
                                              <a href="student-marks/{{$mark->id}}/edit" class="btn mr-1 btn-xs btn-success">
                                            <i class="fa fa-edit"></i>
                                              </a>
                                              <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                              </button>
                                          </form>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>
    
@endsection
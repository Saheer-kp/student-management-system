@extends('layouts.main')
@section('content')

<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Students</h2>
                
                
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
                <h5 class="card-header">Students List <span class="float-right"> <a href="/students/create" class="btn btn-primary">Create Student</a></span></h5>
                
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
                    @if (Session::has('delete_failed'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             {{ Session::get('delete_failed') }}
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Reporting Teacher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ Str::upper($student->gender) }}</td>
                                    <td>{{ $student->teacher->name }}</td>
                                    <td>
                                        <form class="row" method="POST" action="/students/{{$student->id}}" onsubmit = "return confirm('Are you sure?')">
                   
                                            @csrf
                                            @method('DELETE')
                                              <a href="students/{{$student->id}}/edit" class="btn mr-1 btn-xs btn-success">
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
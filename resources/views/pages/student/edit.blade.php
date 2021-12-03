@extends('layouts.main')
@section('content')

<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Edit Student</h2>
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
                <h5 class="card-header">Student Form</h5>
                <div class="card-body">
                    <form method="POST" action="/students/{{ $student->id }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @if (Session::has('success'))
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     {{ Session::get('success') }}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Name</label>
                                <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Name" value="{{ $student->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">Age</label>
                                <input type="text" name="age" class="form-control" id="validationCustom02" placeholder="Age" value="{{ $student->age }}">
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">Gender: </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="gender" class="custom-control-input" value="m" {{ $student->gender =="m" ? "checked" : "" }}><span class="custom-control-label">Male</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="gender" class="custom-control-input" value="f" {{$student->gender == "f" ? "checked" : "" }}><span class="custom-control-label">Female</span>
                                </label>
                                
                                @error('gender')
                                   <div><span class="text-danger">{{ $message }}</span></div> 
                                @enderror
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">Reporting Teacher</label>
                                    <select name="reporting_teacher" class="form-control" id="input-select">
                                        <option value="">Choose Teacher</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $student->reporting_teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('reporting_teacher')
                                    <div><span class="text-danger">{{ $message }}</span></div> 
                                    @enderror
                            </div>
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <input type="submit" value="Create" class="btn btn-primary">
                                <a href="/students" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>
    
@endsection
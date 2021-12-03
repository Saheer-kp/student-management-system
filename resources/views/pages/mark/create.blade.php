@extends('layouts.main')
@section('content')

<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create Student Mark</h2>
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
                <h5 class="card-header">Student Mark Form</h5>
                <div class="card-body">
                    <form method="POST" action="/student-marks" class="needs-validation" novalidate>
                        @csrf
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
                                <label for="validationCustom02">Student</label>
                                    <select name="student" class="form-control" id="input-select">
                                        <option value="">Choose Student</option>
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('student')
                                    <div><span class="text-danger">{{ $message }}</span></div> 
                                    @enderror
                            </div>
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">Term</label>
                                    <select name="term" class="form-control" id="input-select">
                                        <option value="">Choose Term</option>
                                        <option value="one" {{ old('term') == "one" ? 'selected' : '' }}>One</option> 
                                     
                                     <option value="two" {{ old('term') == "two" ? 'selected' : '' }}>Two</option>  
                                    </select>
                                    @error('term')
                                    <div><span class="text-danger">{{ $message }}</span></div> 
                                    @enderror
                            </div>
                            
                            <div class="mt-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Maths</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;<label class="ml-4 custom-control custom-radio custom-control-inline">
                                    <input type="text" name="maths" class="form-control" id="validationCustom01" placeholder="Maths Mark" value="{{ old('maths') }}">
                                    
                                </label>
                                @error('maths')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                            </div>
                            <div class="mt-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Science</label>
                                &nbsp;<label class="ml-4 custom-control custom-radio custom-control-inline">
                                    <input type="text" name="science" class="form-control" id="validationCustom01" placeholder="Science Mark" value="{{ old('science') }}">
                                    
                                </label>
                                @error('science')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                            </div>
                            <div class="mt-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">History</label>
                                &nbsp;&nbsp;<label class="ml-4 custom-control custom-control-inline">
                                    <input type="text" name="history" class="form-control" id="validationCustom01" placeholder="History Mark" value="{{ old('history') }}">
                                    
                                </label>
                                @error('history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                            </div>
                            
                            
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <input type="submit" value="Save" class="btn btn-primary">
                                <a href="/student-marks" class="btn btn-danger">Cancel</a>
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
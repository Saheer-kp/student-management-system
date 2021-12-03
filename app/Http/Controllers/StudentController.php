<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with("teacher")->get();
        //return $students;
        return view('pages.student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view("pages.student.create", compact("teachers"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Student::create([
            "name" => $request->name,
            "age" => $request->age,
            "gender" => $request->gender,
            "reporting_teacher_id" => $request->reporting_teacher,
        ]);

        return back()->with("success", "Student Created Successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view("pages.student.edit", compact("student", "teachers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update([
            "name" => $request->name,
            "age" => $request->age,
            "gender" => $request->gender,
            "reporting_teacher_id" => $request->reporting_teacher,
        ]);

        return back()->with("success", "Student Updated Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
        try {
            $student->delete();
            return back()->with("delete", "Student Deleted Successfully !");
        } catch (QueryException $ex) {
            return back()->with("delete_failed", "Cannot delete student, marks added for this student !");

        }
    }
}

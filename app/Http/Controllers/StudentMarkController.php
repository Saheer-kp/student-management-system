<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentMarkRequest;
use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = StudentMark::with("student")->get();
        return view("pages.mark.list", compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view("pages.mark.create", compact("students"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentMarkRequest $request)
    {
        StudentMark::create([
            "student_id" => $request->student,
            "term" => $request->term,
            "maths" => $request->maths,
            "science" => $request->science,
            "history" => $request->history,
        ]);

        return back()->with("success", "Student Mark Created Successfully !");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentMark  $studentMark
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMark $studentMark)
    {
        $students = Student::all();
        return view("pages.mark.edit", compact("studentMark", "students"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentMark  $studentMark
     * @return \Illuminate\Http\Response
     */
    public function update(StudentMarkRequest $request, StudentMark $studentMark)
    {
        $studentMark->update([
            "student_id" => $request->student,
            "term" => $request->term,
            "maths" => $request->maths,
            "science" => $request->science,
            "history" => $request->history,
        ]);
        return back()->with("success", "Student Mark updated Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentMark  $studentMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMark $studentMark)
    {
        $studentMark->delete();
        return back()->with("delete", "Student Mark deleted Successfully !");

    }
}

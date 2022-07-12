<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('students',compact('students'));
    }

    public function addStudent(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->pin_code = $request->pin_code;
        $student->country = $request->country;
        $student->save();
        return response()->json($student);
    }
}

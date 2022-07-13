<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //~ Shows all Students Info
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('students',compact('students'));
    }

    //~ Store Student Info
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

    //~ Get Student Info
    public function getStudentById($id){
        $student = Student::find($id);
        return response()->json($student);
    }

    //~ Update Student Info
    public function updateStudent(Request $request)
    {
        $student=Student::find($request->id);
        $student->name=$request->name;
        $student->address=$request->address;
        $student->city=$request->city;
        $student->pin_code=$request->pin_code;
        $student->country=$request->country;
        $student->save();
        return response()->json($student);
    }

    //~ Delete Student Record
    public function deleteStudent($id)
    {
        $student=Student::find($id);
        $student->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }

    //~ Delete Multiple Student Record
    public function deleteCheckedStudents(Request $request){
        $ids = $request->ids;
        Student::whereIn('id',$ids)->delete();
        return response()->json(['success' => "Students have been deleted"]);
    }

}

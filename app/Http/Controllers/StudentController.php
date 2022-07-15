<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Excel;
use PDF;

class StudentController extends Controller
{
    //~ Shows all Students Info
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('ajax_crud.students',compact('students'));
    }

    //~ Store Student Info
    public function addStudent(Request $request)
    {
        $request->validate(
            [
               'name' => 'required',
               'address' => 'required',
               'city' => 'required',
               'pin_code' => 'required',
               'country' => 'required', 
            ],
            [
                'name.required' => 'Name is Required',
                'address.required' => 'Address is Required',
                'city.required' => 'City is Required',
                'pin_code.required' => 'Pin Code is Required',
                'country.required' => 'Country is Required',
            ]
        );
        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->pin_code = $request->pin_code;
        $student->country = $request->country;
        $student->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    //~ Get Student Info
    public function getStudentById($id){
        $student = Student::find($id);
        return response()->json($student);
    }

    //~ Update Student Info
    public function updateStudent(Request $request)
    {
        $request->validate(
            [
               'name' => 'required',
               'address' => 'required',
               'city' => 'required',
               'pin_code' => 'required',
               'country' => 'required', 
            ],
            [
                'name.required' => 'Name is Required',
                'address.required' => 'Address is Required',
                'city.required' => 'City is Required',
                'pin_code.required' => 'Pin Code is Required',
                'country.required' => 'Country is Required',
            ]
        );

        $student=Student::find($request->id);
        $student->name = $request->name;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->pin_code = $request->pin_code;
        $student->country = $request->country;
        $student->save();
        return response()->json([
            'status' => 'success',
        ]);
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

    //~ Export Students Table Data to Excel Format
    public function exportExcelStudents(){
        return Excel::download(new StudentExport,'studentlist.xlsx');
    }

    //~ Export Students Table Data to CSV Format
    public function exportCSVStudents(){
        return Excel::download(new StudentExport,'studentlist.csv');
    }

    //~ Export Students Table Data to PDF
    public function downloadPDFStudents(){
        $students = Student::all();
        $pdf = PDF::loadView('ajax_crud.students-pdf',compact('students'));
        return $pdf->download('students.pdf');
    }

    //~ Import Students Table Data to excel/csv
    public function importStudents(Request $request){
        $studentdata = Excel::import(new StudentImport,$request->file);
        return redirect()->back()->with('studentdata');
    }
}

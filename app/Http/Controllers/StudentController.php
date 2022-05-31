<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
 
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('pages.student.add-student', compact('students'));
    }
    public function importStudent(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|max:10000|mimes:xlsx,xls',
        // ]);
        // dd($request->file);
        $path = $request->file;
        // Excel::toCollection(new StudentsImport, $path);
        $res = Excel::import(new StudentsImport("My name is Firaol biru"), request()->file('file'));
        
       
    }
}

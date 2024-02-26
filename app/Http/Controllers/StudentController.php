<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        return view("student.create");
    }

    public function store(Request $request){
        $student=new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;
        $student->save();
        return redirect()->route('student.index');
    }

    public function index(){

        return view('student.index',
        [
            'students'=>Student::all()
        ]);
    }

    public function edit($id){
        $student=Student::find($id);
        return view('student.edit',
            [
                'student'=>$student
            ]);
    }

    public function save($id, Request $request){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;
        $student->save();
        return redirect()->route('student.index');
    }

    public function delete($id){
        Student::destroy($id);
        return redirect()->route('student.index');
    }
}

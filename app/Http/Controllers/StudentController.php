<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{

    public function __construct()
    {

    }

    public function create(){
        return view("student.create");
    }

    public function store(StudentRequest $request){

        $student=new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;
        $student->save();
        return redirect()->route('student.index');
    }

    public function index(Request $request){

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

    public function save($id, StudentRequest $request){





        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;

        if ($request->file('document')!==null){
            $file=$request->file('document');

            //$file->storeAs('/public', $file->getClientOriginalName());
            $file->store('/documents');

            $student->document_file=$file->hashName();
            $student->document_name=$file->getClientOriginalName();
        }

        $student->save();
        return redirect()->route('student.index');
    }

    public function delete($id){
        Student::destroy($id);
        return redirect()->route('student.index');
    }

    public function document($id){
        $student=Student::find($id);

        return response()->download(storage_path()."/app/documents/".$student->document_file, $student->document_name);
            //$student->document_name;
    }

    public function documentDelete($id){
        $student=Student::find($id);

        unlink(storage_path()."/app/documents/".$student->document_file);

        $student->document_file=null;
        $student->document_name=null;
        $student->save();



        return redirect()->route('student.edit',$id);

    }
}

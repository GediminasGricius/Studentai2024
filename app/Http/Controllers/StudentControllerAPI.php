<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentControllerAPI extends Controller
{

    public function __construct()
    {

    }

    public function students(){
        return Student::all();
    }

    public function student($id){
        $student= Student::find( $id);
        if ($student==null){
            return response()->json(['message'=>'student not found'],404);
        }
        return $student;
    }

    public function store(Request $request){
        $student= new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;
        $student->save();
        return $student;
    }

    public function update(Request $request,$id){
        $student=Student::find($id);
        if ($student==null){
            return response()->json(['message'=>'student not found'],404);
        }
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->phone=$request->phone;
        $student->save();
        return $student;
    }

    public function destroy($id){

        $student=Student::find($id);
        if ($student==null){
            return response()->json(['message'=>'student not found'],404);
        }
        $student->delete();
        return $student;
    }


}

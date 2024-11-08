<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        return view('CreateStudent');
    }

    public function store(Request $request){
//       $obj = new Student();
//       $obj->fname=$request->firstname;
//       $obj->lname=$request->lastname;
//       $obj->telephone=$request->telephone;
//       $obj->save();

        $request->validate([
            'fname'=>'required',
            'lname'=>'required|min:3',
            'telephone'=>'required|max:8'
        ]);

        Student::create($request->all());
       return redirect()->route('student-list');
    }

    public function list(){
        $data = Student::all();
        return view('liststudent')->with('data',$data);
    }

    function view($id)
    {
        $data = Student::find($id);
        return view('viewstudent')->with('data',$data);

    }

    function edit($id){
        $data = Student::find($id);
        return view('EditStudent')->with('data',$data);
    }

    function update(Request $request,$id){
       $obj = Student::find($id);
       $obj->fill($request->all());
//       $obj->fname=$request->fname;
//       $obj->lname=$request->lname;
//       $obj->telephone=$request->telephone;
       $obj->save();
       return redirect()->route('student-list');
    }

    function delete($id)
    {
        $obj = Student::find($id);
        $obj->delete();
        return redirect()->route('student-list');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();


        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->blood_group = $request->blood_group;
        $student->grade = $request->grade;
        $student->religion = $request->religion;
        $student->address = $request->address;
        $student->nationality = $request->nationality;
        $student->email = $request->email;
        $student->phone_no = $request->phone_no;
        $student->state = $request->state;
        $student->lga = $request->lga;
        $student->password = $request->password;


        if($student->save())
            return response()->json(["message"=>"student added","student"=>$student]);

        return response()->json(["message"=>"student not added"],500);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student =  Student::find($id);

        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->blood_group = $request->blood_group;
        $student->grade = $request->grade;
        $student->religion = $request->religion;
        $student->address = $request->address;
        $student->nationality = $request->nationality;
        $student->email = $request->email;
        $student->state = $request->state;
        $student->lga = $request->lga;
        $student->phone_no = $request->phone_no;



        if($student->save())
            return response()->json(["message"=>"student updated","student"=>$student]);

        return response()->json(["message"=>"student not updated"],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Student::destroy($id))
            return response()->json(["message"=>"student deleted"]);

        return response()->json(["message"=>"student not deleted"],500);

    }
}

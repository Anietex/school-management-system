<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       return response()->json(Teacher::orderBy('created_at',"desc")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email','unique:teachers'],
            'password'=>['required']
        ]);


        $teacher = new Teacher();

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);

        if($teacher->save()){
            return response()->json($teacher);
        }


       return response()->json(["message"=>"Teacher could not be added at the moment"],500);
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
        $this->validate($request,[
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
        ]);


        $teacher =  Teacher::find($id);

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;


        if($teacher->save()){
            return response()->json($teacher);
        }


        return response()->json(["message"=>"Teacher could not be updated at the moment"],500);
    }


    public function changePassword(Request $request,$id){

        $teacher = Teacher::find($id);

        $teacher->password = $request->password;

        if($teacher->save()){
            return response()->json(["message"=>"password updated"]);
        }

        return response()->json(["message"=>"password not updated"],500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Teacher::destroy($id)){
            return response()->json(["message"=>"teacher deleted"]);
        }

        return response()->json(["message"=>"teacher not deleted"],500);

    }
}

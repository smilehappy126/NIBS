<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $classrooms = Classroom::all();

        return view('button4_reserve.index',[
                'weekfirst' => $today,
                'classrooms'=> $classrooms,          
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classrooms = new Classroom;
        $classrooms->roomname= $request->roomname;
        $classrooms->word= $request->word;
        $classrooms->imgurl= $request->imgurl;
        $classrooms->save();
        return redirect('/newclassroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {

        $classrooms = Classroom::all();

        return view('button4_reserve.index',[
                'weekfirst' => $request->weekfirst,
                'classrooms'=> $classrooms,  
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Classroom $classrooms)
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
    public function update(Request $request,Classroom $classrooms)
    {
        $classrooms->update(['word'=>$request->word]);
        return redirect('/newclassroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function new()
    {
        $classrooms = Classroom::all();
        return view('button4_reserve.newclassroom',[
                'classrooms'=> $classrooms,          
            ]);
    }
}
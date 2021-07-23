<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = skill::get()->toJson(JSON_PRETTY_PRINT);
        return response($skill, 200);
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
        //$request['user_id']=Auth()->user()->id;
        $request->validate([
            'name'=>'required',
            
            
        ]);
        $input=$request->all();

       
        $event=skill::create($input);
        return response()->json([
            'message' => 'Successfully created skill!' ], 201);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (skill::where('id', $id)->exists()) {
            $skill = skill::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($skill, 200);
          } else {
            return response()->json([
              "message" => "skill not found"
            ], 404);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        if (skill::where('id', $id)->exists()) {
            $skill = skill::find($id);
    
            $skill->name = is_null($request->name) ? $skill->name : $request->name;
           
            $skill->save();
    
            return response()->json([
              "message" => "records updated successfully".$request->name
            ], 200);
          } else {
            return response()->json([
              "message" => "skill not found"
            ], 404);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(skill::where('id', $id)->exists()) {
            $skill = skill::find($id);
            $skill->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "skill not found"
            ], 404);
          }
    }
}

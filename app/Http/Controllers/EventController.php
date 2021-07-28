<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Events = Events::get()->toJson(JSON_PRETTY_PRINT);
        return response($Events, 200);
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
        
        $request['user_id']=Auth()->user()->id;
        $request->validate([
            'title'=>'required',
            'location'=>'required' ,
            'start_date'=>'required',
            'user_id'=>'required',
            
        ]);
        $input=$request->all();

       
        $event=Events::create($input);
        return response()->json([
            'message' => 'Successfully created Events!' ], 201);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Events::where('id', $id)->exists()) {
            $Events = Events::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Events, 200);
          } else {
            return response()->json([
              "message" => "Events not found"
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
        if (Events::where('id', $id)->exists()) {
            $Events = Events::find($id);
    
            $Events->title = is_null($request->title) ? $Events->title : $request->title;
           
            $Events->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Events not found"
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
        if(Events::where('id', $id)->exists()) {
            $Events = Events::find($id);
            $Events->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Events not found"
            ], 404);
          }
    }
}

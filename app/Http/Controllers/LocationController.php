<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Location = Location::get()->toJson(JSON_PRETTY_PRINT);
        return response($Location, 200);
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

       
        $event=Location::create($input);
        return response()->json([
            'message' => 'Successfully created Location!' ], 201);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Location::where('id', $id)->exists()) {
            $Location = Location::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Location, 200);
          } else {
            return response()->json([
              "message" => "Location not found"
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
        if (Location::where('id', $id)->exists()) {
            $Location = Location::find($id);
    
            $Location->name = is_null($request->name) ? $Location->name : $request->name;
           
            $Location->save();
    
            return response()->json([
              "message" => "records updated successfully".$request->name
            ], 200);
          } else {
            return response()->json([
              "message" => "Location not found"
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
        if(Location::where('id', $id)->exists()) {
            $Location = Location::find($id);
            $Location->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Location not found"
            ], 404);
          }
    }
}

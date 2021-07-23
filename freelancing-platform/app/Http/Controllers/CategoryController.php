<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return response($Category, 200);
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
        $request->validate([
            'title'=>'required',
            
        ]);

        $Category = new Category([
            'title' => $request->get('title'),
            
        ]);
        $Category->save();
        return response()->json([
            'message' => 'Successfully created category!' ], 201);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Category::where('id', $id)->exists()) {
            $Category = Category::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Category, 200);
          } else {
            return response()->json([
              "message" => "Category not found"
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
        if (Category::where('id', $id)->exists()) {
            $Category = Category::find($id);
    
            $Category->title = is_null($request->title) ? $Category->title : $request->title;
           
            $Category->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Category not found"
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
        if(Category::where('id', $id)->exists()) {
            $Category = Category::find($id);
            $Category->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Category not found"
            ], 404);
          }
    }
}

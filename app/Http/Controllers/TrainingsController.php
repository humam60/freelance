<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Training;
use Validator;

class TrainingsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = Training::all();
        return $this->sendResponse($training, 'training read successfully');
       
        
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
        $input = $request->all();
        $validator = Validator::make($input, [
        'name' => 'required',
        'descreption' => 'required',
        'city_id' => 'required',
        'training_cat_id' => 'required'
        
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $training = Training::create($input);

        return $this->sendResponse($training, 'training created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::find($id);
        if (is_null($training)) {
        return $this->sendError('training not found.');
        }

        return $this->sendResponse($training, 'training created successfully.');
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
        
        $input = $request->all();
        $validator = Validator::make($input, [
        'name' => 'required',
        'descreption' => 'required',
        'training_cat_id' => 'required',
        'city_id' => 'required'
       
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $training->name = $input['name'];
        $training->title = $input['title'];
        $training->description = $input['descreption'];
        $training->category_id = $input['training_cat_id'];
        $training->user_id = $input['city_id'];
        

        $training->save();
        return $this->sendResponse($training, 'training updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training->delete();
        return $this->sendResponse($training, 'training destoried successfully.');
    }
}

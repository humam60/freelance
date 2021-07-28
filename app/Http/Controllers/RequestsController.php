<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Requests;

use Illuminate\Http\Request;
use Validator;

class RequestsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Requests::all();
        return $this->sendResponse($requests, 'requests read successfully');
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
     * @param  \Illuminate\Http\request  $requests
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $requests->all();
        $validator = Validator::make($input, [
        'title' => 'required',
        'category_id' => 'required',
        'skill_id' => 'required',
        'user_id' => 'required',
        
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $requests = requests::create($input);

        return $this->sendResponse($requests, 'requests created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requests = Requests::find($id);
        if (is_null($requests)) {
        return $this->sendError('requests not found.');
        }
        return $this->sendResponse($requests, 'requests created successfully.');
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
     * @param  \Illuminate\Http\requests  $requests
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $requests->all();
        $validator = Validator::make($input, [
        'title' => 'required',
        'category_id' => 'required',
        'user_id' => 'required',
        'skill_id' => 'required'
        ]);

        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $requests->title = $input['title'];
        $requests->category_id = $input['category_id'];
        $requests->user_id = $input['user_id'];
        $requests->skill_id = $input['skill_id'];
        $requests->save();
       return $this->sendResponse($requests, 'requests updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requests->delete();
        return $this->sendResponse($requests, 'requests destoried successfully.');

    }
}
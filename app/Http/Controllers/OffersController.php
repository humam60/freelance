<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Offers;
use Illuminate\Http\Request;
use Validator;

class OffersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::all();
        return $this->sendResponse($offers, 'offers read successfully');
        

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
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'skill_id' => 'required',
        'user_id' => 'required',
        
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }

        $offers = Offers::create($input);

        return $this->sendResponse($offers, 'offers created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers = Offers::find($id);
        if (is_null($offers)) {
        return $this->sendError('offers not found.');
        }

        return $this->sendResponse($offers, 'offers created successfully.');
        
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
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'user_id' => 'required',
        'skill_id' => 'required',
       
       
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
    
        $offers->title = $input['title'];
        $offers->description = $input['description'];
        $offers->category_id = $input['category_id'];
        $offers->user_id = $input['user_id'];
        $offers->skill_id = $input['skill_id'];
       

        $offers->save();
        return $this->sendResponse($offers, 'offers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offers->delete();
        return $this->sendResponse($offers, 'offers destoried successfully.');

    }
}

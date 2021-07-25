<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
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
        return $this->sendResponse($offers->toArry(), 'books read successfully');
        // return response()->json([
        // "success" => true,
        // "message" => "offers List",
        // "data" => $offers
        // ]);
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
        'title' => 'required',
        'description' => 'required',
        // 'category_id' => 'required',
        // 'skill_id' => 'required',
        // 'user_id' => 'required'
        
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $offers = Offers::create($input);

        return $this->sendResponse($offers->toArray(), 'offers created successfully.');
        // return response()->json([
        // "success" => true,
        // "message" => "offers created successfully.",
        // "data" => $offers
        // ]);
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

        return $this->sendResponse($offers->toArray(), 'offers created successfully.');
        // return response()->json([
        // "success" => true,
        // "message" => "offers retrieved successfully.",
        // "data" => $offers
        // ]);
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
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'user_id' => 'required',
        'skill_id' => 'required'
       
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $offers->name = $input['name'];
        $offers->title = $input['title'];
        $offers->description = $input['description'];
        $offers->category_id = $input['category_id'];
        $offers->user_id = $input['user_id'];
        $offers->skill_id = $input['skill_id'];

        $offers->save();
        return $this->sendResponse($offers->toArray(), 'offers updated successfully.');
        // return response()->json([
        // "success" => true,
        // "message" => "offers updated successfully.",
        // "data" => $offers
        // ]);
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
        return $this->sendResponse($offers->toArray(), 'offers destoried successfully.');
        // return response()->json([
        // "success" => true,
        // "message" => "offers deleted successfully.",
        // "data" => $offers
        // ]);

    }
}

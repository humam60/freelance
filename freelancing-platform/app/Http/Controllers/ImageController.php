<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File; use Validator; 
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
            'file'  => 'required|mimes:png,jpg,jpeg,gif|max:2305',
            ]);   
  
        if($validator->fails()) {          
             
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
  
   
        if ($file = $request->file('file')) {
            $path = $file->store('public/img');
            $name = $file->getClientOriginalName();
  
            //store your file into directory and db
            $save = new Image();
            $save->title = $path;
            //$save->title = $file;
            //$save->store_path= $path;
            $save->save();
               
            return response()->json([
                "success" => true,
                "message" => "Image successfully uploaded",
                "file" => $file
            ]);
   
        }
  
   
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function postdata(Request $request)
    {
        
        $validation = Validator::make($request->all(),[
           
            'title'=>'required',
            'description'=>'required',
            'image_url'=>'required',
            "published"=>'required',
         ]);
         if($validation->fails())
         {

            return response()->json($validation->errors(),202);
        }

        
        $user=Post::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request['title'],
            'description'=>$request['description'],
            'image_url'=>$request['image_url'],
            'published'=>$request['published']

            
        ]);
        
        
        
        
        
        return response()->json(['result'=>"success"],200);

    }
}

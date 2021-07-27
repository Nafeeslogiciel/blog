<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostHandleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return User::find(1)->getPost;
        
        //return ProductResource::collection(Post::all());
        $userId = Auth::user()->id;
		$user = User::find($userId);
		$posts = $user->post()->get();
		return ProductResource::collection($posts);
        
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
        $validation = Validator::make($request->all(),[
           
            'title'=>'required',
            'description'=>'required',
            'image_url'=>'required',
            "published"=>'required',
            
         ]);
        if($validation->fails())
        {

            return response()->json($validation->errors(),422);
        }

        
        $user=Post::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request['title'],
            'description'=>$request['description'],
            'image_url'=>$request->file('image_url')->store('app'), 
            'published'=>$request['published'],
            'username'=>Auth::user()->name

        ]);
        
        
        return response()->json(['result'=>"Record insert Successfully "],201);
        //
    }

    
    
    public function edit(PostHandle $postHandle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostHandle  $postHandle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $data=Post::find($id);
        $data->title = $request->title;
        $data->description=$request->description;
        $data->image_url=$request->image_url;
        $data->published=$request->published;
        $data->save();

        return response()->json(['result'=>"update succeccfully"],200);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostHandle  $postHandle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    
    $data=Post::find($id);
    
    $data->delete();
    if($data)
    {

        return response()->json(['result'=>"Delete succeccfully"],200);

    }



        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
          ])){
             $user= Auth::user();
             $resArr=[];
             
             $resArr['token']=$user->createToken('api-application')->accessToken;
             $resArr['name']=$user->name;
             return response()->json($resArr,200);
            }
            else{
                return response()->json(['error'=>'Unauthorized Access'],401);
            }



        //
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
        
        //

        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required'
            

    ]);
    if($validation->fails())
    {
        return response()->json($validation->errors(),202);
    }
    $allData=$request->all();
    $allData['password']=bcrypt($allData['password']);
    
    $user=User::create($allData);

    $resArr=[];
    
    $resArr['name']=$user->name;
    return response()->json($resArr,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

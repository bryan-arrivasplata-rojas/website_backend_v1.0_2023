<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $http = new Http();
        $user = $http -> get('users');
        return view('profiles.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'description' => $request->description,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'id' => $request->id,
        ];
        $respuesta = $http -> post('profiles',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('profiles.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->id[0];
            return redirect()->route('profiles.index')->with('error',$error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $http = new Http();
        $respuesta = $http -> get('profiles/'.$id);
        $user = $http -> get('users');
        if($respuesta->res=='true'){
            return view('profiles.edit',compact('respuesta','id','user'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('profiles.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'description' => $request->description,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'id' => $request->id,
        ];
        $respuesta = $http -> upd('profiles/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('profiles.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->id[0];
            return redirect()->route('profiles.index')->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $respuesta = $http -> del('profiles/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('profiles.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('profiles.index')->with('error',$error);
        }
    }
}

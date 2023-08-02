<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class UserController extends Controller
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
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $http = new Http();
        $role = $http -> get('roles');
        return view('users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'idRol' => $request->idRol,
        ];
        $respuesta = $http -> post('users',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('users.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->password[0];
            return redirect()->route('users.index')->with('error',$error);
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
        $respuesta = $http -> get('users/'.$id);
        $role = $http -> get('roles');
        if($respuesta->res=='true'){
            return view('users.edit',compact('respuesta','id','role'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('users.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'idRol' => $request->idRol,
        ];
        $respuesta = $http -> upd('users/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('users.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->password[0];
            return redirect()->route('users.index')->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $respuesta = $http -> del('users/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('users.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('users.index')->with('error',$error);
        }
    }
}

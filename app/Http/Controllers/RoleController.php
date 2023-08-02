<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;
class RoleController extends Controller
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
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'description' => $request->description,
        ];
        $respuesta = $http -> post('roles',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('roles.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->description[0];
            return redirect()->route('roles.index')->with('error',$error);
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
        $respuesta = $http -> get('roles/'.$id);
        if($respuesta->res=='true'){
            return view('roles.edit',compact('respuesta','id'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('roles.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'description' => $request->description
        ];
        $respuesta = $http -> upd('roles/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('roles.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->description[0];
            return redirect()->route('roles.index')->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $respuesta = $http -> del('roles/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('roles.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('roles.index')->with('error',$error);
        }
    }
}

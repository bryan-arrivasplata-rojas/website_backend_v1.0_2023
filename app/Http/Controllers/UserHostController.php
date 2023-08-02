<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class UserHostController extends Controller
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
        return view('userhosts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $http = new Http();
        $user = $http -> get('users');
        $host = $http -> get('hosts');
        return view('userhosts.create',compact('user','host'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'id' => $request->id,
            'idHost' => $request->idHost,
        ];
        $respuesta = $http -> post('userhosts',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('userhosts.index')->with('success',$success);
        }else{
            if(isset($respuesta->errors->id[0])){
                $error = $respuesta->errors->id[0];
                return redirect()->route('userhosts.index')->with('error',$error);
            }else{
                $error = $respuesta->errors->idHost[0];
                return redirect()->route('userhosts.index')->with('error',$error);
            }
            
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
        $respuesta = $http -> get('userhosts/'.$id);
        $user = $http -> get('users');
        $host = $http -> get('hosts');
        if($respuesta->res=='true'){
            return view('userhosts.edit',compact('respuesta','id','user','host'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('userhosts.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'id' => $request->id,
            'idHost' => $request->idHost,
        ];
        $respuesta = $http -> upd('userhosts/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('userhosts.index')->with('success',$success);
        }else{
            if(isset($respuesta->errors->id[0])){
                $error = $respuesta->errors->id[0];
                return redirect()->route('userhosts.index')->with('error',$error);
            }else{
                $error = $respuesta->errors->idHost[0];
                return redirect()->route('userhosts.index')->with('error',$error);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $respuesta = $http -> del('userhosts/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('userhosts.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('userhosts.index')->with('error',$error);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;
class FileController extends Controller
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
        return view('files.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $http = new Http();
        $userhost = $http -> get('userhosts');
        $usability = $http -> get('usabilities');
        return view('files.create',compact('userhost','usability'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'url' => $request->url,
            'name' => $request->name,
            'description' => $request->description,
            'position' => $request->position,
            'urlOptional' => $request->urlOptional,
            'idUserHost' => $request->idUserHost,
            'idUsability' => $request->idUsability,
        ];
        $respuesta = $http -> post('files',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('files.index')->with('success',$success);
        }else{
            if(isset($respuesta->errors->idUserHost[0])){
                $error = $respuesta->errors->idUserHost[0];
                return redirect()->route('files.index')->with('error',$error);
            }else{
                $error = $respuesta->errors->idUsability[0];
                return redirect()->route('files.index')->with('error',$error);
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
        $respuesta = $http -> get('files/'.$id);
        $userhost = $http -> get('userhosts');
        $usability = $http -> get('usabilities');
        if($respuesta->res=='true'){
            return view('files.edit',compact('respuesta','id','userhost','usability'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('files.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'url' => $request->url,
            'name' => $request->name,
            'description' => $request->description,
            'position' => $request->position,
            'urlOptional' => $request->urlOptional,
            'idUserHost' => $request->idUserHost,
            'idUsability' => $request->idUsability,
        ];
        $respuesta = $http -> upd('files/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('files.index')->with('success',$success);
        }else{
            if(isset($respuesta->errors->idUserHost[0])){
                $error = $respuesta->errors->idUserHost[0];
                return redirect()->route('files.index')->with('error',$error);
            }else{
                $error = $respuesta->errors->idUsability[0];
                return redirect()->route('files.index')->with('error',$error);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $respuesta = $http -> del('files/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('files.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('files.index')->with('error',$error);
        }
    }
}

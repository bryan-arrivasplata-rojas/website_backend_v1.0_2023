<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;
class ImageController extends Controller
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
        return view('images.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $http = new Http();
        $extension = strtolower($request->file('image')->getClientOriginalExtension());
        $body = [
            'name' => $request->name,
            'extension' => $extension,
        ];
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $extension = $request->file('image')->getClientOriginalExtension();
        if($extension=='gif'){
            $path = $request->file('image')->storeAs('public/assets/img/'.$request->name.'.gif');
        }else{
            $path = $request->file('image')->storeAs('public/assets/img/'.$request->name.'.png');
        }
        $respuesta = $http -> post('images',$body);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('images.index')->with('success',$success);
        }else{
            if(isset($respuesta->errors->name[0])){
                $error = $respuesta->errors->name[0];
                return redirect()->route('images.index')->with('error',$error);
            }else{
                $error = $respuesta->errors->image[0];
                return redirect()->route('images.index')->with('error',$error);
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
        $respuesta = $http -> get('images/'.$id);
        if($respuesta->res=='true'){
            return view('images.edit',compact('respuesta','id'));
        }else{
            $error = $respuesta->error;
            return redirect()->route('images.index')->with('error',$error);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $http = new Http();
        $body = [
            'name' => $request->name
        ];
        $respuesta = $http -> upd('images/'.$id,$body);
        if($respuesta->res=='true'){
            $success = $respuesta -> msg;
            return redirect()->route('images.index')->with('success',$success);
        }else{
            $error = $respuesta->errors->name[0];
            return redirect()->route('images.index')->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $http = new Http();
        $response = $http -> get('images/'.$id);
        if($response->res=='true'){
            $rest = substr($response->data->url, -3);
            if($rest=='gif'){
                unlink(storage_path().'/app/public/assets/img/'.$response->data->name.'.gif');
            }else{
                unlink(storage_path().'/app/public/assets/img/'.$response->data->name.'.png');
            }
            
        }else{
            $error = $response->error;
            return redirect()->route('images.index')->with('error',$error);
        }
        //unlink(storage_path().'\app\public\assets\img/'.$image->name.'.png');
        $respuesta = $http -> del('images/'.$id);
        if($respuesta->res=='true'){
            $success = $respuesta->msg;
            return redirect()->route('images.index')->with('success',$success);
        }else{
            $error = $respuesta->error;
            return redirect()->route('images.index')->with('error',$error);
        }
    }
}

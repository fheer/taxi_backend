<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Http\Requests\StoreBloodTypeRequest;
use App\Http\Requests\UpdateBloodTypeRequest;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    /**
     * 
     * Construct of a Blood Type Class Controller 
     */

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BloodType::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return BloodType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBloodTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodTypeRequest $request)
    {
        //
        $first = BloodType::where('BloodType', $request->BloodType)->first();
        if (!isset($first)) {
            $item = BloodType::create($request->input());
            return response()->json([
                'data' => $item,
                'message' => "Registro guardado con exito"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "No se pudo guardar los datos"
            ]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $item = BloodType::find($request->id);
        if (isset($item)) {
            return response()->json([
                'data' => $item,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "No se encontro el registro"
            ]);
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodTypeRequest $request)
    {
        //
        $item = BloodType::find($request->id);
        if (isset($item)) {
            $item->BloodType = $request->BloodType;
            $item->save();
            return response()->json([
                'data' => $item,
                'message' => "Registro Actualizado con exito"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "No se pudo actualizar los datos"
            ]);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $item = BloodType::where('id', (int)$request->id)->first();
        if (isset($item)) {
            //$exist->deleted_at = Carbon::now();
            $item->delete();
            return response()->json([
                //'data' => $exist,
                'message' => "Registro Eliminado con exito"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "No se pudo Eliminar los datos"
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * 
     * Construct of a Blood Type Class Controller 
     */

     public function __construct()
     {
        $this->middleware('auth:api', ['except' => ['login']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return User::Class all
     */
    public function list()
    {
        //
        return User::all();
    }

    /**
     * Log In to app.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $item = User::where('email', $request->email)->first();
        $item->rememberToken = $token;
        $item->save();

        $item = Person::where('id', $item->id)->first();
        return response()->json([
            'id' => $item->id,
            'Ci' => $item->Ci,
            'DrivingLicense' => $item->DrivingLicense,
            'FirstName' => $item->FirstName,
            'token' => $token,
        ]);
        //return $this->respondWithToken($token , $item);
        /*
        $item = User::where('email', $request->email)->first();
        
        if (Hash::check($request->password, $item->password)) {
            $token=$item->createToken('AccessClient')->accessToken;
            //$token = Str::random(100);
            $item->rememberToken = $token;
            $item->save();
            $result = array(
                'success' => true,
                'data' => $item,
                'token' => $token,
                'msg' => trans('messages.listed')
            );
            return $result;
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        //*/
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
        //
        $inputs = $request->input();
        //return ;
        $first = User::where('email', $request->email)->first();
        if (!isset($first)) {
            $inputs = $request->input();
            $inputs['password'] = Hash::make(trim($inputs['password']));
            $item = User::create($inputs);
            
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $item = User::find($request->id);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $item = User::find((int)$request->id);
        //return $item;
        if (isset($item)) {
            $item->name = $request->name;
            $item->email = $request->email;
            $item->password = Hash::make(trim($request->password));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $item = User::where('id', (int)$request->id)->first();
        if (isset($item)) {
            $item->delete();
            return response()->json([
                'message' => "Registro Eliminado con exito"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "No se pudo Eliminar el registro"
            ]);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $item)
    {
        return response()->json([
            'result' => $item,
            //'access_token' => $token,
            //'token_type' => 'bearer',
            //'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}

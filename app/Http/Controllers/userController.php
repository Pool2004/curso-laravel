<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; // Asegúrate de importar el modelo Producto
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function createUserApi(Request $request){

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        $usuario = User::where('email', $validate['email'])->first();

        if($usuario){
            return response()->json([
                'status' => 'error',
                'message' => 'El usuario ya existe'
            ], 400);
        }

        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($validate['password']),
            'remember_token' => Str::random(10)
        ]);

        

        return response()->json([
            'message' => 'Usuario creado exitosamente'
        ], 201);
    }

    public function loginUser(Request $request){
        $validate = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:8'
        ]);

        $usuario = User::where('email', $validate['email'])->first();

        if(!$usuario || !Hash::check($validate['password'], $usuario->password)){
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        // Creamos el token

        $token = $usuario->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario logueado exitosamente',
            'token' => $token
        ], 200);
    }

    public function logout(Request $request){

        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Token eliminado correctamente'], 200);
    }

   


    public function getUsers(){

        $usuarios = User::all();

        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function getUserId($id){

        $usuario = User::find($id);

        if(!$usuario){
            return response()->json(['message' => 'El usuario no existe'], 404);
        }


        return response()->json(['usuarios' => $usuario], 200);

    }

    


}

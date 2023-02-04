<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'STATUS' => 404,
                'ERROR' => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'STATUS' => 404,
                'ERROR' => 'Kredencijali neispravni'
            ]);
        } else {
            $token = $user->createToken('TOKEN-LOGIN')->plainTextToken;

            return response()->json([
                'STATUS' => 200,
                'USER' => $user,
                'TOKEN' => $token
            ]);
        }
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'STATUS' => 200,
            'MESSAGE' => 'LOGOUT'
        ]);
    }






    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'STATUS' => 404,
                'ERROR' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'STATUS' => 200,
            'USER' => $user
        ]);
    }
}

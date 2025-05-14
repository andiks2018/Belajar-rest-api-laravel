<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //selanjutnya kita buat fungsi
    public function login (Request $request)
    {
        // validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // check if user is exist
        $user = User::where('email', $request->email)->first();
        // check if password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Bad credentials'
            ], 401);
        }
        // generate token
        //$token = $user->createToken('token')->plainTextToken;
        return $user->createToken('token')->plainTextToken;
        // return response ini alternatif dengan
        // return response()->json([
        //     'message' => 'Login success',
        //     'token' => $token
        // ]);
    }

    public function register (Request $request)
    {
        // code ..
    }

    public function logout (Request $request)
    {
        // code ..
    }

}

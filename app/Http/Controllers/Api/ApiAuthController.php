<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //selanjutnya kita buat fungsi
    public function login (LoginRequest $request)
    {
        // validate dengan auth::attempt
        // $credentials = $request->only('email', 'password');
        if (Auth::attempt($request->only('email', 'password'))) {
            // jika berhasil login, kita ambil usernya
            $user = User::where('email', $request->email)->first();
            // token lama dihapus
            $user->tokens()->delete();
            // buat token baru dibuat
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => 'Login success',
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            // jika gagal login
            return response()->json([
                'message' => 'coba cek email dan password anda'
            ], 401);
        }
    }

    public function register (Request $request)
    {
        // code ..
    }

    public function logout (Request $request)
    {
        // hapus token
        // $request->user()->currentAccessToken()->delete();
        // respon no content
        // returbn response()->noContent();
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

}

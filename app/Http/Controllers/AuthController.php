<?php

namespace App\Http\Controllers;


use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = app('hash')->make($request->password);

        if ($user->save()) {
            return response()->json(["message" => "Registrasi Berhasil"], 200);
        }
        return response()->json(['message' => 'Registrasi Gagal, coba lagi'], 400);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => 'required',
            "password" => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Email atau password salah!'
            ], 400);
        }
        $token = $user->createToken('api-token');

        $response = response()->json([
            'status' => 'success',
            'user' => $user,
            'token' => $token
        ]);
        return $response;
    }

    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}

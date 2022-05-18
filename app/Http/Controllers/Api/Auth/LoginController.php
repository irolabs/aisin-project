<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = $request -> validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:8'],
        ]);

        if(!Auth::attempt($user))
        {
            return response()->json([
                'message' => 'Proses Login Gagal',
                'errors' => [
                    'root' => "Email atau Password Anda Salah."
                ]

            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $accessToken = Auth::user()->createToken('access_token')->accessToken;

        return response()->json([
            'message' => 'Proses Login Berhasil',
            'data' => Auth::user(),
            'meta' => [
                'token' => $accessToken
            ]
        ],Response::HTTP_CREATED);
    }


    public function logout()
    {
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'Logout Sukses',
        ],Response::HTTP_OK);
    }

}

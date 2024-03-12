<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\AuthFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthFormRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorretas.'],
            ]);
        }
        $token =  $user->createToken($request->name)->plainTextToken;
        return response()->json(['token'=>$token], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['success' => true], 200);
    }
}

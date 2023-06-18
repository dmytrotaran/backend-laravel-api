<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // REGISTER USER METHOD ================================
    public function register(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        $validatedData['password'] = bcrypt($request->password);
        
        $user = User::create($validatedData);
        
        return $user;
    }

    // LOGIN USER METHOD ==================================
    public function login(Request $request)
    {
        // return $request->all();
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }
        
        // login token 
        $accessToken = auth()->user()->createToken('authToken')->plainTextToken; 

        $cookie = cookie('jwt', $accessToken, 60*24); // 1 day
        
        return response(['message' => 'Success','user' => auth()->user()]) -> withCookie($cookie);
        // return response(['user' => auth()->user()]);
    }

    // LOGOUT USER METHOD =================================

    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        
        return response(['message' => 'Success']) -> withCookie($cookie);
    }

    
    // GET USER METHOD ===================================
    public function getUser(Request $request)
    {
        return auth()->user();
    }
}

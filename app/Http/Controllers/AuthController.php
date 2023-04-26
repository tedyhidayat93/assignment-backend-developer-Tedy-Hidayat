<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\AuthServiceImplement;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    protected $authService;
    
    public function __construct(AuthServiceImplement $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Authenticate user and return token
     */
    public function login(Request $request)
    {
       return $this->authService->login($request);
    }


    /**
     * Register new user
     */
    public function register(Request $request)
    {
        // Valdiation Gate
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|min:2',
            'password' => 'required|min:5',
        ]);
        
        // Store data user
        return $this->authService->signup($request);
    }
}

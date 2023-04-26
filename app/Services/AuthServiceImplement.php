<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\AuthInterfaceRepository;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthServiceImplement implements AuthInterfaceService
{

    protected $mainRepository;

    public function __construct(AuthInterfaceRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function login($data = null)
    {
        $credentials = $data->only('username', 'password');
        
        $token = null;
        
        $token = $this->mainRepository->login($credentials);
        
        try {
            if (!$token) return response()->json([
                    'success' => false,
                    'message' => 'Invalid username or password',
                ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create token',
            ], 400);
        }
        
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
    
    public function signup($data)
    {


         // checking duplicate users
         $check_user = User::where('username',$data['username'])->first();
         if ($check_user) {
             return response()->json([
                 'success' => false,
                 'message' => 'User already exist !',
             ], 409);
         }


        //  Store Data User
        $signup = $this->mainRepository->signup([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    
        if($signup) {
            return response()->json([
                'success' => true,
                'message' => 'User created.',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something error!',
            ], 400);
        }
        
    }
    
}

<?php

namespace App\Repositories;


use App\Models\User;
use JWTAuth;

class AuthRepositoryImplement implements AuthInterfaceRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login($credentials)
    {
        return JWTAuth::attempt($credentials);
    }
    
    public function signup($data)
    {
        return User::create($data);
    }
}

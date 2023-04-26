<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServiceImplement;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;
    
    public function __construct(UserServiceImplement $userService)
    {
        $this->userService = $userService;
    }

     /**
     * Get list of all users
     */
    public function index()
    {
        $per_page = 100;
        return $this->userService->getAllWithPaginate($per_page);
    }

     /**
     * Get user by ID
     */
    public function getById($id)
    {
        return $this->userService->getById($id);
    }
}

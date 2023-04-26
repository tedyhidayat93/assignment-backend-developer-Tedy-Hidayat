<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Repositories\UserInterfaceRepository;


class UserServiceImplement implements UserInterfaceService
{
    protected $mainRepository;

    public function __construct(UserInterfaceRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getAllWithPaginate($data = null)
    {
        $users = $this->mainRepository->getAllWithPaginate($data);
        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }
    
    public function getById($data)
    {

        $user = $this->mainRepository->getById($data);

        if(!empty($user)) {
            return response()->json([
                'success' => true,
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found !',
            ], 404);
        }
    }
}

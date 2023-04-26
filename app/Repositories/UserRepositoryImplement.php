<?php

namespace App\Repositories;

use App\Models\User;

class UserRepositoryImplement implements UserInterfaceRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllWithPaginate($per_page)
    {
        return User::orderBy('id', 'DESC')->paginate($per_page);
    }
    
    public function getById($id)
    {
        return User::where(['id' => $id])->first();
    }
}

<?php

namespace App\Repositories;


interface UserInterfaceRepository
{
    public function getAllWithPaginate($per_page);
    public function getById($id);
}

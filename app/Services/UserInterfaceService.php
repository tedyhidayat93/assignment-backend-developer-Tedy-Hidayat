<?php

namespace App\Services;

interface UserInterfaceService
{
    public function getAllWithPaginate($data);
    public function getById($id);
}

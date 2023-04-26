<?php

namespace App\Repositories;


interface AuthInterfaceRepository
{
    public function login($data);
    public function signup($id);
}

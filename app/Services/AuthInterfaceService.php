<?php

namespace App\Services;

interface AuthInterfaceService
{
    public function login($data);
    public function signup($data);
}

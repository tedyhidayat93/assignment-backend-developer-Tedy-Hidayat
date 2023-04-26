<?php

namespace App\Providers;

use App\Repositories\UserInterfaceRepository;
use App\Repositories\UserRepositoryImplement;
use App\Services\UserInterfaceService;
use App\Services\UserServiceImplement;

use App\Repositories\AuthInterfaceRepository;
use App\Repositories\AuthRepositoryImplement;
use App\Services\AuthInterfaceService;
use App\Services\AuthServiceImplement;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(UserInterfaceRepository::class, UserRepositoryImplement::class);
        $this->app->bind(AuthInterfaceRepository::class, AuthRepositoryImplement::class);
        
        // Services
        $this->app->bind(UserInterfaceService::class, UserServiceImplement::class);
        $this->app->bind(AuthInterfaceService::class, AuthServiceImplement::class);
    
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

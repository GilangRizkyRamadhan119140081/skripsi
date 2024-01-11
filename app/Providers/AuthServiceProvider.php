<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\SitusBersejarah;
use App\Policies\SitusEdit;
use App\Policies\SitusDelete;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // ...
        // User::class => UserPolicy::class, // Sesuaikan dengan nama class policy yang Anda buat
        SitusBersejarah::class => SitusEdit::class,
        SitusBersejarah::class => SitusDelete::class,
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

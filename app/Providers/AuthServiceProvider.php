<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Manga;
use App\Models\Chapter;
use App\Policies\MangaPolicy;
use App\Policies\ChapterPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Manga::class => MangaPolicy::class,
        Chapter::class => ChapterPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //gates here
        Gate::define('admin-only', fn(User $user) => $user->role === 'admin');
    }
}

<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Manga;
use App\Models\Reply;
use App\Models\Chapter;
use App\Policies\MangaPolicy;
use App\Policies\ReplyPolicy;
use App\Policies\ChapterPolicy;
use App\Policies\CommentPolicy;
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
        Chapter::class => ChapterPolicy::class,
        Comment::class => CommentPolicy::class,
        Reply::class => ReplyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //gates here
        Gate::define('admin-only', fn(User $user) => $user->role === 'admin');
        Gate::define('dashboard', fn(User $user) => $user->role === 'admin' || $user->role === 'author');
    }
}

<?php

namespace App\Providers;

use App\Models\Blog\Post;
use App\Models\Meeting\Coach;
use App\Observers\Blog\PostObserver;
use App\Observers\Meeting\CoachObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $observers = [
        Post::class => [PostObserver::class],
        Coach::class => [CoachObserver::class]
    ];

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {
        //
    }
}

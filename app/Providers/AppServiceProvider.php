<?php

namespace App\Providers;


use App\Mail\MeetingsMail;
use App\Mail\TasksMail;
use Illuminate\Support\Facades\{Blade, Mail};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Meeting::created(function ($meeting){
            foreach (\App\User::get() as $user){
                Mail::to($user->email)->send(new MeetingsMail($meeting));
            }
        });

        \App\Task::created(function ($task){
            foreach (\App\User::get() as $user){
                Mail::to($user->email)->send(new TasksMail($task));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') === 'production') {
            $this->app['url']->forceScheme('https');
        }
    }
}

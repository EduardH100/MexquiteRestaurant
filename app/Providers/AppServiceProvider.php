<?php

namespace App\Providers;

use App\Client;
use App\Mail\ClientCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Client::created(function($client) {
            retry(5, function() use ($client) {
                Mail::to($client)->send(new ClientCreated($client));    
            }, 100);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // putting something in the toychest
        app()->bind(Newsletter::class, function () {
            return new Newsletter(
                new ApiClient(),
                'foobar'
            );
        });
    }
}

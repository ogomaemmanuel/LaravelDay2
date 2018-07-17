<?php

namespace App\Providers;

use App\LipaNaMpesaBuilder;
use App\MpesaAuth;
use App\PaymentManager;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {$this->app->bind('App\MpesaAuth',function ($app){
        return new MpesaAuth(env('MPESA_CONSUMER_KEY'), env('MPESA_CONSUMER_SECRET'));
    });

        $this->app->bind('PaymentManager',function ($app){
            return new PaymentManager(App::make('App\MpesaAuth'),App::make('LipaNaMpesaBuilder'));
        });


        $this->app->bind('LipaNaMpesaBuilder',function($app){

            return new LipaNaMpesaBuilder();
        });

        $this->app->bind('App\Blogs\Repositories\BlogRepositoryInterface',
            'App\Repositories\BlogRepository');
    }
}

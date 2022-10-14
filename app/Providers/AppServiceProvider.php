<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Model::unguard();

       Gate::define('admin', function(User $user){
          return $user->username == 'aliasefore';
       });


    //    Blade::if('admin', function(){
    //     return request()->user()?->can('admin');
    //    });

    }
}

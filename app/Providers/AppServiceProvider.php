<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Friend;
use App\Models\User;
use Auth;


use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        view()->composer(
            'inc.sidebar', 
            function ($view) {
                $view->with('countRequest', Friend::join('users',  function ($join) {
                    $join->on('friends.user_id', '=', 'users.id');                
                })
                    ->select('users.id', 'users.name', 'users.avatar', 'users.slug')
                    ->where(['friends.friend_id'=>Auth::id(), 'friends.accept'=> 0])->count() );
            }
        );

    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        view()->composer('*' , function($view){
            $view->with('categories', Category::with('subcategory')->get());
            // $view->with('cartProducts',Cart::Where('user_id',auth()->user()->id)->count());
            if (Auth::check()) {
                   $view->with('cartProducts',Cart::Where('user_id', Auth::user()->id)->count());
            }
        });
    }  
}

<?php

namespace App\Providers;
use Log;
use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        
        View::composer('layouts.app', function ($view) {
            $user = Auth::user()->id;
            
            $notifications = Notification::where('u_id', $user)
                ->where('read_at', null)
                ->orderBy('created_at', 'desc')
                ->get();
            $view->with('notifications', $notifications); 
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Paginator::useBootstrapFive();
        View::composer('layouts.header', function ($view) {
            if (auth()->check()) {
                $notifications = Notification::where('user_id', auth()->id())
                    ->latest()
                    ->take(10)
                    ->get();
                $view->with('notifications', $notifications);
            }

        });
        // View::composer('layouts.header', function ($view) {
        //     if (auth()->check()) {
        //         $user = auth()->user();
                
        //         if ($user->hasRole('admin')) {
        //             $notifications = Notification::latest()
        //                 ->take(10)
        //                 ->get();
        //         } 
        //         else {
        //             $notifications = Notification::where('user_id', $user->id)
        //                 ->latest()
        //                 ->take(10)
        //                 ->get();
        //         }
                
        //         $view->with('notifications', $notifications);
        //     }
        // });
    }
}

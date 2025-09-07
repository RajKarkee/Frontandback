<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\FooterComposer;
use Illuminate\Support\Facades\Cache;
use App\Models\ContactInformation;

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
        // Register view composers
        View::composer('partials.footer', FooterComposer::class);
        View::composer('new.layouts.sidebar', \App\View\Composers\SidebarComposer::class);
        view::composer('*',function($view){
            $contactInfo = Cache::remember('contact_info',60*60*24,function(){
                return ContactInformation::first();
            });
            $view->with('contactInfo', $contactInfo);
        });
    }
}

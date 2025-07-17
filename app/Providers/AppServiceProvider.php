<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

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
        View::composer('*', function ($view) {
            $logoSetting = Setting::where('key', 'logo')->first();
            $logo = $logoSetting ? $logoSetting->value : null;
            $user = auth()->user();
            $view->with('logo', $logo)->with('user', $user);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App;
use View;
use App\Models\Setting;
use App\Models\Configration;
use Auth;

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
        //
        Schema::defaultStringLength(191);
        \URL::forceScheme('https');

        view()->composer('*', function($view)
        {
            $setting = Setting::first();
            $lang = \LaravelLocalization::getCurrentLocale();
            App::setlocale($lang);
            $configration = Configration::where('lang',$lang)->first();
            App::setlocale($lang);

            View::share('language', $lang);
            View::share('setting', $setting);
            View::share('configration', $configration);
        });
    }
}

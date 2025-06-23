<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\Blade;
use Nwidart\Modules\Facades\Module;
use Modules\Core\Helpers\ModuleHelper;


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
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle)
            ->prefix(LaravelLocalization::setLocale())
                ->middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']); // Add your custom middleware here
        });

        Paginator::useBootstrapFive();


        // Blade directive to check if a module is enabled
        Blade::if('module', function ($moduleName) {
            // return Module::has($moduleName) && Module::find($moduleName)->isEnabled();
            return ModuleHelper::isEnabled($moduleName);

        });
    }
}

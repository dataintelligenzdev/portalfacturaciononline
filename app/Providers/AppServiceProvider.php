<?php

namespace App\Providers;

use App\Models\Empresa;
use App\Observers\EmpresaObserver;
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
        Empresa::observe(EmpresaObserver::class);
    }
}

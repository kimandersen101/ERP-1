<?php

namespace App\Providers;

use App\Http\View\Composers\PageComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['water.*', 'shop.*', 'home.*', 'site.*'], PageComposer::class);
    }
}

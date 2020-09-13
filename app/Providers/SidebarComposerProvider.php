<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidebarComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeSidebar();
    }

    public function composeSidebar()
    {
      view()->composer('inc.aside','App\Http\Composers\SidebarComposer');
    }
}

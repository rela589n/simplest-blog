<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IncludesServiceProvider extends ServiceProvider
{
    /**
     * Include helpers.
     *
     * @return void
     */
    public function boot()
    {
        require app_path('Includes/helpers.php');
    }
}

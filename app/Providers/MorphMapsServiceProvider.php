<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphMapsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Relation::morphMap([
            'post'     => Post::class,
            'category' => Category::class,
        ]);
    }
}

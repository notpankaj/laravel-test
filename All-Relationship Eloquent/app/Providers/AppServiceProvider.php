<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Relations\Relation;

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

    // use Illuminate\Database\Eloquent\Relations\Relation;
    public function boot()
    {
        Relation::morphs([
            'Post' => \App\Post::class,
            'Video' => \App\Video::class,
            ]);
        }
}

<?php

namespace Medlib\BookCover\Services;

use Medlib\BookCover\BookCover;

use Illuminate\Support\ServiceProvider;

class CoverServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return \Medlib\BookCover\BookCover
     */
    public function register()
    {
        $this->app->singleton('cover', function () {
            $cover = new BookCover();
            return $cover;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cover'];
    }
}
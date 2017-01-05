<?php

namespace Medlib\BookCover\Services;

use Medlib\BookCover\BookCover;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CoverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerViewDirective();
    }

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

    /**
     * Register view directive.
     */
    protected function registerViewDirective()
    {
        Blade::directive('cover', function ($expression) {
            $parts = explode(',', $expression);
            $data = count($parts) > 1 ? implode(',', $parts) : '[]';
            $template = 'uploader::'.trim(array_shift($parts), '"\'');
            $data = Cover::setTitle('An Encyclopaedia of the history of technolology')
                ->setCreators('Ian McNeil')
                ->setPublisher('Routledge')
                ->setDatePublished('1990')
                ->randomizeBackgroundColor()
                ->getImageBase64();
            return "<?php echo \$__env->make('{$template}', array_merge(array_except(get_defined_vars(), array('__data', '__path')), (array)$data))->render(); ?>";
        });
    }
}
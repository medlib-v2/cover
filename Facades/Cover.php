<?php


namespace Medlib\BookCover\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Medlib\BookCover\Facades\Cover
 */
class Cover extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'cover'; }
}
<?php

namespace TychoEngberink\LaravelHomewizard\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TychoEngberink\LaravelHomewizard\LaravelHomewizard
 */
class LaravelHomewizard extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \TychoEngberink\LaravelHomewizard\LaravelHomewizard::class;
    }
}

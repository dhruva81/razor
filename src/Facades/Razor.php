<?php

namespace Dhruva81\Razor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dhruva81\Razor\Razor
 */
class Razor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Dhruva81\Razor\Razor::class;
    }
}

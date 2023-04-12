<?php

namespace MG\Moyasar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MG\Moyasar\Moyasar
 */
class Moyasar extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MG\Moyasar\Moyasar::class;
    }
}

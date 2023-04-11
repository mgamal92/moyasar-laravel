<?php

namespace MG\Moyasar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MG\Moyasar\Moyasar
 */
class Moyasar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MG\Moyasar\Moyasar::class;
    }
}

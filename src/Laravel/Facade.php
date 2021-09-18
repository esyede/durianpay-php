<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Laravel;

use Esyede\DurianPay\Http\Client;
use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}

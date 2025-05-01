<?php

namespace App\Traits;

use App\Scopes\UserScope;
use CreatesApplication;
trait UserScoped
{
    protected static function bootUserScoped()
    {
        static::addGlobalScope(new UserScope);
    }
}
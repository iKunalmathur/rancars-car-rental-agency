<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait URLbyUUID
{
    protected static function bootURLbyUUID()
    {
        static::creating(function ($model) {
            $model->{'uuid'} = (string) Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

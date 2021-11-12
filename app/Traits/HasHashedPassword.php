<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HasHashedPassword
{
    /**
     * Boot the trait
     *
     * @return void
     */
    protected function bootHasHashedPassword()
    {
        static::saving(function ($model) {
            $model->password = Hash::make($model->password);
        });
    }
}

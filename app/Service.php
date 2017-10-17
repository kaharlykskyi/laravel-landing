<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Service extends Model
{
    public static function getAll(): Collection
    {
        return Service::all();
    }
}

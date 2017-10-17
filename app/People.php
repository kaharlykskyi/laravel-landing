<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class People extends Model
{
    protected $table = 'peoples';

    public static function getChuck(int $quantity): Collection
    {
        return People::take($quantity)->get();
    }
}

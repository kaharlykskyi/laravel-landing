<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Page extends Model
{
    public static function getAll(): Collection
    {
        return Page::all();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use DB;

class Portfolio extends Model
{
    public static function getPortfolioFilters(): array
    {
        return DB::table('portfolios')->distinct()->pluck('filter')->toArray();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Page, Service, Portfolio, People};

class IndexController extends Controller
{
    public function execute()
    {
        $pages = Page::all();
        $services = Service::all();
        $portfolio = Portfolio::all();
        $peoples = People::take(3)->get();

        return view('site.index');
    }
}

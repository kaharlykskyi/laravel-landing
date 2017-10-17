<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Page, Service, Portfolio, People};
use App\Services\SiteService;

class IndexController extends Controller
{

    public function execute()
    {
        $pages = Page::all();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $peoples = People::take(3)->get();

        $menu = SiteService::generateMenu($pages);
        $tags = Portfolio::getPortfolioFilters();

        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags,
        ]);
    }




}

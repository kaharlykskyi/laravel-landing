<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Page, Service, Portfolio, People};
use App\Services\SiteService;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->pages = Page::getAll();
        $this->services = Service::getAll();
        $this->portfolios = Portfolio::getAll();
        $this->peoples = People::getChuck(3);
        $this->tags = Portfolio::getPortfolioFilters();
        $this->menu = SiteService::generateMenu($this->pages);
    }

    public function execute()
    {
        return view('site.index', [
            'menu' => $this->menu,
            'pages' => $this->pages,
            'services' => $this->services,
            'portfolios' => $this->portfolios,
            'peoples' => $this->peoples,
            'tags' => $this->tags,
        ]);
    }




}

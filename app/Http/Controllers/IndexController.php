<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Page, Service, Portfolio, People};
use App\Services\SiteService;
use Log;

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
        $data = [
            'menu' => $this->menu,
            'pages' => $this->pages,
            'services' => $this->services,
            'portfolios' => $this->portfolios,
            'peoples' => $this->peoples,
            'tags' => $this->tags,
        ];

        return view('site.index', $data);
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'text' => 'required',
        ]);

        $data = $request->all();

        Log::notice('Message from '.$data['name'].' email: '.$data['email'].' with question: '.$data['text']);
        return redirect()->route('home.show')->with('status', 'Email was sended!');
    }
}

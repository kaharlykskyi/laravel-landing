<?php

namespace App\Services;

use Illuminate\Support\Collection;

class SiteService
{
    public static function generateMenu(Collection $pages): array
    {
        $menu = [];
        foreach ($pages as $page) {
            $item = ['title' => $page->name,'alias' => $page->alias,];
            $menu[] = $item;
        }

        $menu[] = ['title' => 'Services','alias' => 'service'];
        $menu[] = ['title' => 'Portfolio','alias' => 'Portfolio'];
        $menu[] = ['title' => 'Team','alias' => 'team'];
        $menu[] = ['title' => 'Contact','alias' => 'contact'];

        return $menu;
    }
}
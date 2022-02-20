<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $catalog = Catalog::select(Catalog::$availableFields)->get();
        return view('news.index', ['catalog' => $catalog]);
    }

    public function catalog(Catalog $catalog)
    {
        $news = $catalog->news;
        return view('news.catalog', ['catalog'=>$catalog,'newsList' => $news]);
    }

    public function news(Catalog $catalog,News $news)
    {
        return view('news.news', ['catalog'=>$catalog,'news' => $news]);
    }

}

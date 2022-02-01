<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = Catalog::select(Catalog::$availableFields)->get();

        return view('news.index', ['catalog' => $news]);
    }

    public function category(Catalog $catalog)
    {
        return view('news.category', ['newsList' => $catalog]);
    }

    public function news(Catalog $catalog,News $news)
    {
        return view('news.news', ['catalog'=>$catalog,'news' => $news]);
    }

}

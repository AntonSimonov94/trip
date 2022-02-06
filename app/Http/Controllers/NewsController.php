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

    public function catalog(Catalog $catalog)
    {
        $selectNews = \DB::table('catalogs_has_news')
            ->where('catalog_id', $catalog->id)
            ->get()
            ->map(fn($item) => $item->news_id);
        foreach ($selectNews as $num){
            $news[] = News::query()->where('id', $num)->get();
        }
        return view('news.catalog', ['catalog'=>$catalog,'newsLists' => $news]);
    }

    public function news(Catalog $catalog,News $news)
    {
        return view('news.news', ['catalog'=>$catalog,'news' => $news]);
    }

}

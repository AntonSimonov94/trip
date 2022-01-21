<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();

        return view('news.index', ['catalog' => $news]);
    }

    public function category($name)
    {
        $news = $this->getNews();
        return view('news.category', ['catalog' => $news, 'name' => $name]);
    }

    public function news($name, $des)
    {
        $news = $this->getNews();

        return view('news.news', ['catalog' => $news, 'name' => $name, 'news' => $des]);
    }
}

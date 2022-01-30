<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = new Catalog();
        $news = $news->getNews();

        return view('news.index', ['catalog' => $news]);
    }

    public function category($id)
    {
        $news = new Catalog();
        $news = $news->getNewsbyId($id);
        return view('news.category', ['name' => $news, 'id' => $id]);
    }

    public function news($name,$id)
    {
        $news = new Product();
        $news = $news->getNewsbyId($id);

        return view('news.news', ['name'=>$name,'des' => $news]);
    }

}

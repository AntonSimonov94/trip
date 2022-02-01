<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\News;
use App\Models\Sources;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::all();
        $sources = Sources::all();
        return view('admin.news.create',['catalogs' => $catalogs, 'sources' => $sources]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title','producer','description']) + [
                'slug' => \Str::slug($request->input('title'))];

        $created = News::create($data);
        if($created) {
            foreach ($request->input('news') as $catalog) {
                \DB::table('catalogs_has_news')->insert([
                    'catalog_id' => intval($catalog),
                    'news_id' => $created->id
                ]);}
                foreach ($request->input('sources') as $source) {
                    \DB::table('news_has_sources')->insert([
                        'sources_id' => intval($source),
                        'news_id' => $created->id
                    ]);
            }
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $sources = Sources::all();
        $catalogs = Catalog::all();
        $selectCatalogs = \DB::table('catalogs_has_news')
            ->where('news_id', $news->id)
            ->get()
            ->map(fn($item) => $item->catalog_id)->toArray();


        return view('admin.news.edit', [
            'news' => $news,
            'catalogs' => $catalogs,
            'selectCatalogs' => $selectCatalogs,
            'sources' => $sources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->only(['title','producer','description']) + [
                'slug' => \Str::slug($request->input('title'))];


        $updated = $news->fill($data)->save();
        if($updated) {

            \DB::table('catalogs_has_news')
                ->where('news_id', $news->id)
                ->delete();

            foreach ($request->input('news') as $catalog) {
                \DB::table('catalogs_has_news')->insert([
                    'catalog_id' => intval($catalog),
                    'news_id' => $news->id
                ]);}

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

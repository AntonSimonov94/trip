<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\News;
use Illuminate\Http\Request;

class AdminCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Catalog::all();
        return view('admin.catalog.index', ['catalogsList' => $catalog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::all();
        return view('admin.catalog.create',['catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title','description','created_at']) + [
                'slug' => \Str::slug($request->input('title'))];

        $created = Catalog::create($data);
            if($created) {
                return redirect()->route('admin.catalog.index')
                    ->with('success', 'Запись успешно добавлена');
            }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Catalog $catalogs
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Catalog $catalogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {

        return view('admin.catalog.edit', [
            'catalogs' => $catalog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Catalog $catalogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        $data = $request->only(['title','description']) + [
                'slug' => \Str::slug($request->input('title'))];

        $updated = $catalog->fill($data)->save();
        if($updated) {

            \DB::table('catalogs_has_news')
                ->where('catalog_id', 5)
                ->delete();

            return redirect()->route('admin.catalog.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Catalog $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $news)
    {
        //
    }
}

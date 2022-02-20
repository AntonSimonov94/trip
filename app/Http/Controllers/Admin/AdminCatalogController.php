<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\CreateRequest;
use App\Http\Requests\Catalog\UpdateRequest;
use App\Models\Catalog;
use App\Models\News;
use App\Services\UploadService;
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
    public function store(CreateRequest $request)
    {
        $data = $request->validated() + [
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
    public function update(UpdateRequest $request, Catalog $catalog)
    {
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $validated['image'] = app(UploadService::class)->saveFile($request->file('image'));
        }

        $updated = $catalog->fill($validated)->save();
        if($updated) {
            \DB::table('catalogs_has_news')
                ->where('catalog_id', $catalog->id)
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
    public function destroy(Catalog $catalog)
    {

        try{
            $catalog->delete();
            return response()->json('ok');
        }catch (\Exception $e) {
            \Log::error('News error destroy', [$e]);
            return response()->json('error', 400);
        }
    }
}

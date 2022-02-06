<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\UpdateRequest;
use App\Models\Catalog;
use App\Models\News;
use App\Models\Sources;
use Illuminate\Http\Request;

class AdminSourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Sources::all();
        return view('admin.sources.index', ['sourcesList' => $sources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Sources::all();
        return view('admin.sources.create', ['sources' => $sources]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $created = Sources::create($data);
        if($created) {
            return redirect()->route('admin.sources.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Sources $source
     * @return \Illuminate\Http\Response
     */
    public function show(Sources $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sources $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Sources $source)
    {
        return view('admin.sources.edit', [
            'sources' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Sources $source
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Sources $source)
    {
       $data = $request->validated();

       $updated = $source->fill($data)->save();
        if($updated) {

            \DB::table('news_has_sources')
                ->where('sources_id', $source->id)
                ->delete();

            return redirect()->route('admin.sources.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sources $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sources $source)
    {
        try{
            $source->delete();
            return response()->json('ok');
        }catch (\Exception $e) {
            \Log::error('News error destroy', [$e]);
            return response()->json('error', 400);
        }
    }
}

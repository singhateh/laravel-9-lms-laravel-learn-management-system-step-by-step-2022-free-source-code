<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Jambasangsang\Flash\Facades\LaravelFlash;

class NewsController extends Controller
{
    public function index()
    {
        Gate::authorize('view_news');
        return view(
            'jambasangsang.backend.news.index',
            [
                'newses' => News::get()
            ]
        );
    }


    public function create()
    {
        Gate::authorize('add_news');
        return view('jambasangsang.backend.news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        Gate::authorize('add_news');

        $news = News::create($request->validated());
        $news->image  = uploadOrUpdateFile($request, $news->image, \constPath::NewsImage);
        $news->save();
        LaravelFlash::withSuccess('News Created Successfully');
        return redirect()->route('newses.index');
    }


    public function show($slug)
    {
        Gate::authorize('view_news');
        $news = News::whereSlug($slug)->firstOrFail();
        $news->update(['is_read' => 'yes']);
        return view('jambasangsang.backend.news.show', ['news' => $news]);
    }


    public function edit($slug)
    {
        Gate::authorize('edit_news');

        $news = News::whereSlug($slug)->firstOrFail();
        return view('jambasangsang.backend.news.edit', compact('news'));
    }


    public function update(UpdateNewsRequest $request, $slug)
    {
        Gate::authorize('edit_news');

        $news = News::whereSlug($slug)->firstOrFail();

        $news->update($request->validated());
        $news->image  = uploadOrUpdateFile($request, $news->image, \constPath::NewsImage);
        $news->save();
        LaravelFlash::withSuccess('News Updated Successfully');
        return redirect()->route('newses.index');
    }


    public function destroy($slug)
    {
        Gate::authorize('delete_news');

        $news = News::whereSlug($slug)->firstOrFail();

        dd($news);
        removeFile($news->image, \constPath::NewsImage);
        $news->delete();
        LaravelFlash::withSuccess('News Deleted Successfully');
        return redirect()->route('newses.index');
    }

    public function single($slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();
        $news->update(['is_read' => 'yes']);
        return view('jambasangsang.frontend.news.single', ['news' => $news]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use function Ramsey\Uuid\v1;
use Illuminate\Database\Eloquent\Builder;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Jambasangsang\Flash\Facades\LaravelFlash;

class CategoryController extends Controller
{


    public function index()
    {
        return view('jambasangsang.backend.categories.index', ['categories' => Category::whereNull('parent_id')->paginate(5)]);
    }


    public function create()
    {
        return view('jambasangsang.backend.categories.create', ['categories' => Category::whereNull('parent_id')->get()]);
    }


    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $category->image  = uploadOrUpdateFile($request, $category->image, \constPath::CategoryImage);
        $category->save();
        LaravelFlash::withSuccess('Category Created Successfully');
        return redirect()->route('categories.index');
    }


    public function show(Category $category)
    {
        dd($category);
    }


    public function edit(Category $category)
    {
        // dd($category);
        return view('jambasangsang.backend.categories.edit', ['singleCategory' => $category, 'categories' => Category::whereNull('parent_id')->get()]);
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $category->image  = uploadOrUpdateFile($request, $category->image, \constPath::CategoryImage);
        $category->save();
        LaravelFlash::withSuccess('Category Updated Successfully');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        //
    }

    public function single($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $courses = $category->courses()->with('teacher:id,name,image,slug', 'students:id')->orderBy('created_at', 'DESC')->paginate(6);

        // dd($category);
        return view(
            'jambasangsang.frontend.courses.index',
            ['courses' => $courses]
        );
    }

    // , function (Builder $query) use ($slug) {
    //     $query->whereSlug($slug);
    // }
}

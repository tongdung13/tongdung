<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(7);

        return view('backend.categories.list', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $category = new Category();
        $category->fill($categoryRequest->all());
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Bạn đã thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($categoryRequest->all());
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Bạn đã sửa danh mục thành công!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Bạn đã xóa danh mục thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.category.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('admin.dashboard.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        Category::create($data);

        return redirect(route('dashboard.categories'))->with('message', 'Category created successfully!');
    }

    public function edit($id)
    {
        return view('admin.dashboard.category.edit', ['category' => Category::all()->find($id)]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $category = Category::all()->find($id);
        $category->update($data);

        return redirect(route('dashboard.categories'))->with('message' , 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::all()->find($id);
        $category->delete();
        return redirect(route('dashboard.categories'))->with('message', 'Category deleted successfully!');
    }
}

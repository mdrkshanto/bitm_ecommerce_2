<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $title, $category, $categories;

    public function index()
    {
        $this->title = "Category";
        $this->categories = Category::orderBy('name', 'asc')->get();
        return view('admin.category.index', [
            'title' => $this->title,
            'categories' => $this->categories
        ]);
    }

    public function create()
    {
        $this->title = "New Category";
        return view('admin.category.add.index', ['title' => $this->title]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        Category::createCategory($request);
        return redirect(route('category'))->with('msg', ucwords($request->name).' Category Created Successfully.');
    }

    public function edit($slug)
    {
        $this->title = 'Update Category';
        $this->category = Category::where('slug', $slug)->first();
        return view('admin.category.edit.index', [
            'title' => $this->title,
            'category' => $this->category
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
//            'name' => ['required', 'string', Rule::unique('categories','name')->ignore($id)],
            'name' => 'required|string|unique:categories,name,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'required|digits_between:0,1'
        ], [
            'status.digits_between' => 'The status field must be active or inactive.',
        ]);
        $this->category = Category::find($id);
        Category::updateCategory($request, $id);
        return redirect(route('category'))->with('msg', $this->category->name.' Category Updated Successfully.');
    }

    public function delete($id)
    {
        $this->category = Category::find($id);
        $count = $this->category->subCategories()->count();
//        dd($this->category->subCategories());
//        exit();

        if ($this->category->subCategories()->exists()) {
            return back()->with('error_msg', 'Cannot Delete. ' . $this->category->name . ' Category has ' . $count . ' Sub ' . ($count > 1 ? 'Categories.' : 'Category.'));
        } else {
            Category::deleteCategory($id);
            return back()->with('msg', 'Category Deleted Successfully.');
        }
    }
}

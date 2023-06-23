<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    private $title, $subCategory, $subCategories = [], $categories = [];

    public function index()
    {
        $this->subCategories = SubCategory::orderBy('name', 'asc')->get();
        $this->title = 'Sub Category';
        return view('admin.sub-category.index', [
            'title' => $this->title,
            'subCategories' => $this->subCategories
        ]);
    }

    public function create()
    {
        $this->categories = Category::orderBy('name', 'asc')->get();

        $this->title = 'New Sub Category';
        return view('admin.sub-category.add.index', [
            'title' => $this->title,
            'categories' => $this->categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:sub_categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ],
            [
                'category_id.required' => 'Must select a category.',
                'category_id.exists' => 'The selected category is not exist.',
            ]
        );

        SubCategory::createSubCategory($request);
        return redirect(route('sub-category'))->with('msg', 'Subcategory Created Successfully.');
    }

    public function edit($slug)
    {
        $this->title = 'Update Subcategory';
        $this->subCategory = SubCategory::where('slug', $slug)->first();
        $this->categories = Category::orderBy('name', 'asc')->get();
        return view('admin.sub-category.edit.index', [
            'title' => $this->title,
            'categories' => $this->categories,
            'subCategory' => $this->subCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:sub_categories,name,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ],
            [
                'category_id.required' => 'Must select a category.',
                'category_id.exists' => 'The selected category is not exist.',
            ]
        );
        SubCategory::updateSubCategory($request, $id);
        return redirect(route('sub-category'))->with('msg', 'Subcategory Updated Successfully.');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('msg', 'Subcategory Deleted Successfully.');
    }


}

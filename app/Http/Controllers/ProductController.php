<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $title, $product, $products, $category, $categories, $subCategory, $subCategories, $brand, $brands, $unit, $units;

    public function index()
    {
        $this->title = 'Product';
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        return view('admin.product.index',[
            'title' => $this->title,
            'categories'=>$this->categories,
            'subcategories'=>$this->subCategories,
            'brands'=>$this->brands,
            'units'=>$this->units
        ]);
    }

    public function create()
    {
        $this->title = 'New Product';
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        return view('admin.product.add.index',[
            'title'=>$this->title,
            'categories'=>$this->categories,
            'subcategories'=>$this->subCategories,
            'brands'=>$this->brands,
            'units'=>$this->units
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }
}

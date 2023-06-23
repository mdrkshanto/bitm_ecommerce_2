<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Brand;

class BrandController extends Controller
{
    private $title, $brand, $brands;

    public function index()
    {
        $this->title = 'Brands';
        $this->brands = Brand::orderBy('name', 'asc')->get();
        return view('admin.brand.index',[
            'title'=>$this->title,
            'brands'=>$this->brands
        ]);
    }

    public function create()
    {
        $this->title = 'New Category';

        return view('admin.brand.add.index',[
            'title' => $this->title
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        Brand::createBrand($request);
        return redirect(route('brand'))->with('msg', 'Brand Created Successfully.');
    }

    public function edit($slug)
    {
        $this->title = 'Update Brand';
        $this->brand = Brand::where('slug', $slug)->first();
        return view('admin.brand.edit.index', [
            'title' => $this->title,
            'brand' => $this->brand
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
//            'name' => ['required', 'string', Rule::unique('brands','name')->ignore($id)],
            'name' => 'required|string|unique:brands,name,'.$id,
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'status'=>'required|digits_between:0,1'
        ],[
            'status.digits_between'=>'The status field must be active or inactive.',
        ]);
        Brand::updateBrand($request, $id);
        return redirect(route('brand'))->with('msg', 'Brand Updated Successfully.');
    }


    public function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('msg', 'Brand Deleted Successfully.');
    }
}

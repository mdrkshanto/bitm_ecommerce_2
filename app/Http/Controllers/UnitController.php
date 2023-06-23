<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Unit;

class UnitController extends Controller
{
    private $title, $unit, $units;

    public function index()
    {
        $this->title = 'Units';
        $this->units = Unit::orderBy('name', 'asc')->get();
        return view('admin.unit.index',[
            'title'=>$this->title,
            'units'=>$this->units
        ]);
    }

    public function create()
    {
        $this->title = 'New Category';

        return view('admin.unit.add.index',[
            'title' => $this->title
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:units,name',
            'description' => 'nullable|string',
        ]);

        Unit::createUnit($request);
        return redirect(route('unit'))->with('msg', 'Unit Created Successfully.');
    }

    public function edit($slug)
    {
        $this->title = 'Update Unit';
        $this->unit = Unit::where('slug', $slug)->first();
        return view('admin.unit.edit.index', [
            'title' => $this->title,
            'unit' => $this->unit
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
//            'name' => ['required', 'string', Rule::unique('units','name')->ignore($id)],
            'name' => 'required|string|unique:units,name,'.$id,
            'description' => 'nullable|string',
            'status'=>'required|digits_between:0,1'
        ],[
            'status.digits_between'=>'The status field must be active or inactive.',
        ]);
        Unit::updateUnit($request, $id);
        return redirect(route('unit'))->with('msg', 'Unit Updated Successfully.');
    }


    public function delete($id)
    {
        Unit::deleteUnit($id);
        return back()->with('msg', 'Unit Deleted Successfully.');
    }
}

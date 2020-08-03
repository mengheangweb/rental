<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Category;
use App\Equipment;
use DB;
use Auth;

class UnitController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('loginPeroid');
    }

    public function index()
    {
    	$units = Unit::orderBy('id','desc')->simplePaginate(2);

    	return view('unit.index', ['units' => $units]);
    }

    public function create()
    {
        $categories = Category::all();
        $equipments = Equipment::all();

    	return view('unit.create',compact('categories','equipments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|in:s,m,l',
            'category' => 'required|exists:categories,id',
        ]);

        $unit = Unit::create($request->except(['_token','category']));

        $category = Category::find($request->category);

        $unit->category()->associate($category);

        $unit->save();

        $unit->equipments()->attach($request->equipment);

    	return redirect('/unit');
    }

    public function edit($id)
    {
        // select * from units where id = ?
        $unit = Unit::find($id);

    	return view('unit.edit', compact('unit'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric|min:100',
            'size' => 'required|in:s,m,l',
        ]);

        $data = $request->only(['name','price', 'size']);

    	Unit::where('id', $id)->update($data);

    	return redirect('/');
    }

    public function delete($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

    	return redirect('/unit')->with('success','Unit deleted');
    }
}

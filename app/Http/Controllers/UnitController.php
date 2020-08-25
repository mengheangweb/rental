<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Category;
use App\Equipment;
use App\Events\UnitCreated;
use DB;
use Auth;
use Log;

class UnitController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('loginPeroid');
    }

    public function index()
    {
        // dd(\App::getLocale(), session('locale'));
        $units = Unit::orderBy('id','desc')->simplePaginate(2);
        $units_deleted = Unit::onlyTrashed()->get();

        // $units = $units->where('size','l')->all();

    	return view('unit.index', ['units' => $units, 'units_deleted' => $units_deleted]);
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
        ],[
            'name.required' => 'ដាច់ខាតត្រូវបំពេញ'
        ],[
            'name' => __('unit.name'),
            'size' => __('unit.size')
        ]);

        $unit = Unit::create($request->except(['_token','category']));

        $category = Category::find($request->category);

        $unit->category()->associate($category);
        $unit->user_id = Auth::user()->id;

        $unit->save();

        $unit->equipments()->attach($request->equipment);

        event(new UnitCreated());

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
        Log::error('Test Logging');

        $unit = Unit::findOrFail($id);
        $unit->delete();

    	return redirect('/unit')->with('success','Unit deleted');
    }

    public function restore($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->restore();

    	return redirect('/unit')->with('success','Unit Restored');
    }
}

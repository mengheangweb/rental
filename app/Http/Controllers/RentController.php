<?php

namespace App\Http\Controllers;

use App\Rent;
use App\User;
use App\Unit;
use App\Mail\Invoice;
use App\Notifications\Receipt;
use Mail;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::orderBy('id','desc')->simplePaginate(2);

        // dd($rents);

    	return view('rent.index', ['rents' => $rents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $units = Unit::all();

        return view('rent.create',compact('users','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'user' => 'required',
            'unit' => 'required',
        ]);

        $items = [
            'price' => $request->price,
            'user_id' => $request->user,
            'unit_id' => $request->unit,
        ];

        $renting = Rent::create($items);

        $user = User::find($request->user);

        $user->notify(new Receipt($renting));

        // Mail::to($user)->send(new Invoice());

        return redirect('/rent')->with('message','Rent Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }
}

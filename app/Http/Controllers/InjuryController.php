<?php

namespace App\Http\Controllers;

use App\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('injury.index', ['injuries' => Injury::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('injury.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Injury::create( $request->validate([
            'nature' => ['required'],
        ]));

        return redirect('/injury')->with(['success' => 'Injury Type Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function show(Injury $injury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function edit(Injury $injury)
    {
        return view('injury.edit', ['injury'=> $injury]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Injury $injury)
    {
        $injury->update( $request->validate([
            'nature' => ['required'],
        ]));

        return redirect('/injury')->with(['success' => 'Injury Type Updated Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Injury $injury)
    {
        $injury->delete();

        return redirect('/injury')->with(['success' => 'Injury Type Deleted Successful']);
    }
}

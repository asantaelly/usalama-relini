<?php

namespace App\Http\Controllers;

use App\Death;
use Illuminate\Http\Request;

class DeathController extends Controller
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
        return view('death.index', ['deaths' => Death::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('death.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Death::create( $request->validate([
            'nature' => ['required'],
        ]));

        return redirect('/death')->with(['success' => 'Death Type Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function show(Death $death)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function edit(Death $death)
    { 
        return view('death.edit', ['death'=> $death]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Death $death)
    {
        $death->update( $request->validate([
            'nature' => ['required'],
        ]));

        return redirect('/death')->with(['success' => 'Death Type Updated Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function destroy(Death $death)
    {
        $death->delete();

        return redirect('/death')->with(['success' => 'Death Type Deleted Successful']);
    }
}

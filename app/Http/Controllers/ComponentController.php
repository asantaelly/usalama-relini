<?php

namespace App\Http\Controllers;

use App\Component;
use App\Standard;
use Illuminate\Http\Request;

class ComponentController extends Controller
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
        return view('component_standard.index', ['components' => Component::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('component_standard.create');
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
            'component' => ['required'],
            'standard.*.standard' => ['required']
        ]);
            // dd($request);
       $component =  Component::create([
            'component' => $request['component']
        ]);

        if (is_array($request['standard'])) {

            foreach ($request['standard'] as $std) {
                Standard::create([
                    'standard' => $std['standard'],
                    'component_id' => $component->id,
                ]);
            }
        }

        return redirect('/components')->with(['success' => 'Component Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        return view('component_standard.edit', ['component' => $component]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component)
    {
        $request->validate([
            'component' => ['required'],
            'standard.*.standard' => ['required']
        ]);
           
       $component->update([
            'component' => $request['component']
        ]);

        $component->standards()->delete();
       
        if (is_array($request['standard'])) {

            $component->standards()->createMany($request['standard']);
        }

        return redirect('/components')->with(['success' => 'Component Created Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $component->delete();

        return redirect('/componets')->with(['success' => 'Component Deleted Successful']);
    }
}

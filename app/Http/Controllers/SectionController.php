<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('section.index', ['sections' => Section::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('section.create');
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
            'name' => ['required'],
            'between' => ['required'],
            'rail_size' => ['required'],
            'kilometers' => ['required'],
        ]);

        Section::create([
            'name' => $request['name'],
            'between' => $request['between'],
            'rail_size' => $request['rail_size'],
            'kilometers' => $request['kilometers'],
            'code_name' => $request['name']."-". $request['between'],
        ]);

        return redirect('/section')->with(['success' => 'Section Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('section.edit', ['section' => $section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section->update($request->validate([
            'name' => ['required'],
            'between' => ['required'],
            'rail_size' => ['required'],
            'kilometers' => ['required'],
            'code_name' => ['required']
        ]));

        return redirect('/section')->with(['success' => 'Section Update Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect('/section')->with(['success' => 'Section Update Successful']);
    }
}

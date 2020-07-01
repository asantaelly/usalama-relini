<?php

namespace App\Http\Controllers;

use App\OfficerConcerned;
use Illuminate\Http\Request;

class OfficerConcernedController extends Controller
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
        return view('officer.index', ['officers' => OfficerConcerned::with('officer_contacts')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'name' => ['required'],
            'ext_no' => ['sometimes', 'required'],
            'contact.*.phone_no' => ['required']
        ]);
        
        $officer = OfficerConcerned::create([
            'title' => $request['title'],
            'name' => $request['name'],
            'ext_no' => is_null($request['ext_no'])?null: $request['ext_no'],
        ]);
         

        $officer->officer_contacts()->createMany($request['contact']);
        
        return redirect('/officer')->with(['success' => 'Officer Created Successful']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficerConcerned  $officerConcerned
     * @return \Illuminate\Http\Response
     */
    public function show(OfficerConcerned $officer)
    {
        //return view('officer.show',['officer'=> $officerConcerned]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficerConcerned  $officerConcerned
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficerConcerned $officer)
    {
        
        return view('officer.edit', ['officer'=> $officer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficerConcerned  $officerConcerned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficerConcerned $officer)
    {
        $data = $request->validate([
            'title' => ['required'],
            'name' => ['required'],
            'ext_no' => ['sometimes', 'required'],
            'contact.*.phone_no' => ['required']
        ]);
        
        $officer->update([
            'title' => $request['title'],
            'name' => $request['name'],
            'ext_no' => is_null($request['ext_no'])?null: $request['ext_no'],
        ]);
         

        $officer->officer_contacts()->delete();
        $officer->officer_contacts()->saveMany($request['contact']);
        
        return redirect('/officer')->with(['success' => 'Officer Created Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficerConcerned  $officerConcerned
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficerConcerned $officerConcerned)
    {
        $officerConcerned->delete();

        return redirect()->back()->with(['success' => 'Officer Deleted Successful']);
    }
}

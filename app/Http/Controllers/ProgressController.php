<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
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
        return view('progress.index', ['progress' => Progress::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('progress.create', ['accidents' => Accident::get_dropdown_menu()]);
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
            'accident_id' => ['required','exists:accidents,id'],
            'time.*.time' => ['required', 'date_format:Y-m-d H:i:s'],
            'particulars.*.particulars' => ['required']
        ]);
        $progress = array_combine(array_column($request['time'], 'time'), array_column($request['particulars'], 'particulars'));

        foreach ($progress as $key => $value) {
            Progress::create([
                'time' => $key,
                'particulars' => $value,
                'accident_id' => $request['accident_id']
            ]);
        }
        
        return redirect('/progress')->with(['success' => 'Progress Report Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        return view('progress.edit', ['progress' => $progress, 'accidents' => Accident::get_dropdown_menu()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        $data = $request->validate([
            'accident_id' => ['required','exists:accidents,id'],
            'time.*.time' => ['required', 'date_format:Y-m-d H:i:s'],
            'particulars.*.particulars' => ['required']
        ]);
       $progress->update([
        'time' => $request['time'][0],
        'particulars' => $request['particulars'][0],
        'accident_id' => $request['accident_id']
       ]);
       
        
        return redirect('/progress')->with(['success' => 'Progress Report Updated Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();

        return redirect('/progress')->with(['success' => 'Progress Report Deleted Successful']);
    }
}

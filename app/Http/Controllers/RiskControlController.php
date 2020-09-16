<?php

namespace App\Http\Controllers;

use App\RiskControl;
use App\RiskIdentification;
use Illuminate\Http\Request;

class RiskControlController extends Controller
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
        return view('risk_control.index', ['risks' => RiskControl::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('risk_control.create',  ['risks' => RiskIdentification::get_dropdown_menu()]);
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
            'risk_id' => ['required', 'exists:risk_identifications,id'],
            'description' => ['required']
        ]);

        RiskControl::create([
            'risk_identification_id' => $request['risk_id'],
            'description' => $request['description']
        ]);

        return redirect('/risk_control')->with(['success' => 'Risk Control Created Successful']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\RiskControl  $riskControl
     * @return \Illuminate\Http\Response
     */
    public function show(RiskControl $riskControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RiskControl  $riskControl
     * @return \Illuminate\Http\Response
     */
    public function edit(RiskControl $risk_control)
    {
        return view('risk_control.edit', ['risk_control' => $risk_control, 'risks' => RiskIdentification::get_dropdown_menu()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RiskControl  $riskControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiskControl $risk_control)
    {
        $request->validate([
            'risk_id' => ['required', 'exists:risk_identifications,id'],
            'description' => ['required']
        ]);

        $risk_control->update([
            'risk_identification_id' => $request['risk_id'],
            'description' => $request['description']
        ]);

        return redirect('/risk_control')->with(['success' => 'Risk Control Updated Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiskControl  $riskControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiskControl $risk_control)
    {
        $risk_control->delete();

        return redirect('/risk_control')->with(['success' => 'Risk Control Deleted Successful']);
    }
}

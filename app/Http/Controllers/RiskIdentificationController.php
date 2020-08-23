<?php

namespace App\Http\Controllers;

use App\RiskIdentification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RiskIdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('risk_identification.index', ['risks' => RiskIdentification::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('risk_identification.create', [
            'departments' => get_department_dropdown(),
            'objectives' => get_alphabet_range_dropdown()
            ]);
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
            'objective' => ['required', 'alpha'],
            'risk' => ['required'],
            'department' => ['required', Rule::in(array_column(get_department_dropdown(), 'value'))],
            'description' => ['required'],
        ]);

        $last_risk_id = RiskIdentification::where('risk_id',  'like' , '%'. $request['objective']. get_department_dropdown()[array_search($request['department'], array_column(get_department_dropdown(), 'value'))]['abbr'] . '%')->orderBy('created_at', 'desc')->first();

        if(isset($last_risk_id->id)) {

            $id_section = explode("-", $last_risk_id->risk_id);
            $new_id = $id_section[1] +1;

            RiskIdentification::create([
                'risk_id' => $request['objective']. get_department_dropdown()[array_search($request['department'], array_column(get_department_dropdown(), 'value'))]['abbr'].'-'.$new_id,
                'risk' => $request['risk'],
                'departiment' => $request['department'],
                'description' => $request['description']
            ]);
            
            return redirect('/risk_identification')->with(['success' => 'Identified Risk Created Successful']);
        }

        RiskIdentification::create([
            'risk_id' => $request['objective']. get_department_dropdown()[array_search($request['department'], array_column(get_department_dropdown(), 'value'))]['abbr'].'-'. 1,
            'risk' => $request['risk'],
            'departiment' => $request['department'],
            'description' => $request['description']
        ]);
        
        return redirect('/risk_identification')->with(['success' => 'Identified Risk Created Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RiskIdentification  $riskIdentification
     * @return \Illuminate\Http\Response
     */
    public function show(RiskIdentification $riskIdentification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RiskIdentification  $riskIdentification
     * @return \Illuminate\Http\Response
     */
    public function edit(RiskIdentification $riskIdentification)
    {
        return view('risk_identification.edit', [
            'departments' => get_department_dropdown(), 
            'objectives' => get_alphabet_range_dropdown(), 
            'risk' => $riskIdentification
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RiskIdentification  $riskIdentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiskIdentification $riskIdentification)
    {

        $request->validate([
            'objective' => ['required', 'alpha'],
            'risk' => ['required'],
            'department' => ['required', Rule::in(array_column(get_department_dropdown(), 'value'))],
            'description' => ['required'],
        ]);


        $riskIdentification->update([
            'risk_id' => $request['objective']. get_department_dropdown()[array_search($request['department'], array_column(get_department_dropdown(), 'value'))]['abbr'].'-'. 1,
            'risk' => $request['risk'],
            'departiment' => $request['department'],
            'description' => $request['description']
        ]);
        
        return redirect('/risk_identification')->with(['success' => 'Identified Risk Created Successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiskIdentification  $riskIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiskIdentification $riskIdentification)
    {
        $riskIdentification->delete();

        return redirect('/risk_identification')->with(['success' => 'Identified Risk Deleted Successful']);
    }
}

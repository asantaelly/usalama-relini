<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public $accident;

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
        return view('report.index', [
            'accidents' => Accident::all(), 
            'belonged_quarter' => get_quarters_dropdown(), 
            'operation_years' => get_operation_year_range_dropdown()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
       
        
        if (isset($request['belonged_quarter']) && !is_null($request['belonged_quarter'])) {

            $this->accident = Accident::where('belonged_quarter', $request['belonged_quarter']);
            
        }

        if (isset($request['oparation_year']) && !is_null($request['oparation_year'])) {

            $this->accident->where('time_of_accident' , 'like' , '%'. $request['oparation_year'] . '%');

        }

        if (isset($request['accident_subject']) && !is_null($request['accident_subject'])) {
            
            foreach ($request['accident_subject'] as $key => $value) {
                
                if($key==0) {
                    
                    $this->accident->where('accident_subject', $value['accident_subject']);
                }
                $this->accident->orWhere('accident_subject', $value['accident_subject']);
            }
            
        }

        if (isset($request['cause_of_accident']) && !is_null($request['cause_of_accident'])) {
            
            foreach ($request['cause_of_accident'] as $key => $value) {
                if($key == 0) {
                    $this->accident->where('cause_of_accident', $value['cause_of_accident']);
                }
                $this->accident->orWhere('cause_of_accident', $value['cause_of_accident']);
            }
        }

        if (isset($request['group_by']) && !is_null($request['group_by'])) {
            if (($request['group_by'] == 'injury_nature')) {

            //   $this->accident->with('section', 'deaths', 'injuries')->withCount(['deaths' => function($query){ return $query->selectSub('*' , DB::raw('count(nature) as total'))->groupBy('nature')->toSql();}]);
                
            }elseif (($request['group_by'] == 'death_nature')) {

               // $this->accident->with('section', 'deaths', 'injuries')->withCount(['injuries' => function($query){ return $query->groupBy('nature');}]);

            }else {

                $this->accident->select('*' , DB::raw('count('.$request['group_by'].') as total'))->groupBy($request['group_by']);
            }
            
        //    dd($this->accident->with('section', 'deaths', 'injuries')->get());
        }

        
        $result =    $this->accident->with('section', 'deaths', 'injuries')->get()->map(function($accident) use ($request){
            $data['accident_subject'] = $accident->accident_subject;
            $data['cause_of_accident'] = $accident->cause_of_accident;
            $data['belonged_quarter'] =$accident->belonged_quarter;
            $data['operation_year'] = $request['oparation_year'];
            $data['report_name'] = $request['report_name'];
            $data['total'] = $accident->total;

            if (isset($request['section_name']) && !is_null($request['section_name'])) {

                $data['section_name'] = $accident->section->name;
            }

            if (isset($request['section_between']) && !is_null($request['section_between'])) {

                $data['section_between'] = $accident->section->between;
            }

            if (isset($request['section_rail_size']) && !is_null($request['section_rail_size'])) {

                $data['section_rail_size'] = $accident->section->rail_size;
            }

            if (isset($request['section_kilometers']) && !is_null($request['section_kilometers'])) {

                $data['section_kilometers'] = $accident->section->kilometers;
            }

            if (isset($request['loco_trolley']) && !is_null($request['loco_trolley'])) {

                $data['loco_trolley'] = $accident->loco_trolley;
            }

            if (isset($request['resposible_designation']) && !is_null($request['resposible_designation'])) {

                $data['resposible_designation'] = $accident->resposible_designation;
            }

            if (isset($request['death_nature']) && !is_null($request['death_nature'])) {

                $data['death_nature'] = $accident->deaths;
            }

            if (isset($request['injury_nature']) && !is_null($request['injury_nature'])) {

                $data['injury_nature'] = $accident->injuries;
            }
            return $data;

        });
        
        if(!$result->isEmpty()){

            $generatedTime = \Carbon\Carbon::now();

            $time = 0;
            ini_set('max_execution_time', $time);
            $pdf = \PDF::loadView('report.show_pdf', [
            'data' => $result,
            ]);
            // ->setPaper('a4', 'landscape');

            return $pdf->save('../public/storage/reports/'.$generatedTime.'-report.pdf')->stream('report.pdf');

            // return view('report.show', ['data'=> $result]);
        }

        return redirect()->back()->with(['success' => 'No Data found!']);

        
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('report.show');
    }


}

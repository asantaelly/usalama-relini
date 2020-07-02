<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\InspectionCategory;

class InspectionController extends Controller
{
    
    public function form(){

        return view('dashboard.inspection.inspection_form');
    }

    public function details(){
        return view('dashboard.inspection.inspection_details');
    }

    public function add_details(){

        $inspection_sections = DB::table('inspection_sections')->get();
        $inspection_parts = DB::table('inspection_parts')->get();

        return view('dashboard.inspection.add_details')->with([
            'inspection_sections' => $inspection_sections,
            'inspection_parts' => $inspection_parts,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectionController extends Controller
{
    
    public function form(){

        return view('dashboard.inspection.inspection_form');
    }

    public function details(){
        return view('dashboard.inspection.inspection_details');
    }

    public function add_details(){
        return view('dashboard.inspection.add_details');
    }
}

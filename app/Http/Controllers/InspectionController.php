<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\InspectionCategory;
use Carbon\Carbon;
use App\ChecklistItem;

class InspectionController extends Controller
{
    
    public function form(){

        // $checklists = DB::table('checklist_items')->get();
        $checklists = ChecklistItem::all();

        return view('dashboard.inspection.inspection_form')->with([
            'checklists' => $checklists,
        ]);
    }

    public function details(){

        return view('dashboard.inspection.inspection_details');
    }

    public function add_details(){

        $inspection_sections = DB::table('inspection_sections')->get();
        $inspection_parts = DB::table('inspection_parts')->get();

        // Inspection Details
        $items = DB::table('checklist_items')->get();

        return view('dashboard.inspection.add_details')->with([
            'inspection_sections' => $inspection_sections,
            'inspection_parts' => $inspection_parts,
            'items' => $items,
        ]);
    }


    public function store_details(Request $request){

        $request->validate([
            'checklist_item_id' => 'required',
        ]);


        $particulars = $request->input('inspection.*.particulars');
        $checks = $request->input('inspection.*.checks');
        $remarks = $request->input('inspection.*.remarks');
        $check_list_id = $request->checklist_item_id;

        
        foreach($particulars as $particular){
            
            if($particular == null){
            break;
            }

            DB::table('checklist_particulars')->insert([
                'particular' => $particular,
                'checklist_item_id' => $check_list_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        foreach ($checks as $check) {  

            if($check == null){
            break;
            }

            DB::table('checklist_inspection_checks')->insert([
                'inspection_checks' => $check,
                'checklist_item_id' => $check_list_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        foreach($remarks as $remark){

            if($remark == null){
            break;
            }

            DB::table('checklist_remarks')->insert([
                'remarks' => $remark,
                'checklist_item_id' => $check_list_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('inspection.add');

    }

    public function store_inspection(Request $request){

        $request->validate([
            'comment.*.message' => 'required'
        ]);

        $comments = $request->input('comment.*.message');
        $checklist_number = $request->input('checklist.*.id');

        $Checklist_comments = array_combine($checklist_number, $comments);

        if($Checklist_comments == FALSE){
            return redirect()->route('inspection.form')
                ->with('status', 'Comments can not be Empty!');
        }

        foreach($Checklist_comments as $id => $comment){

            DB::table('inspection_checked')->insert([
                'checklist_item_id' => $id,
                'action_required' => $comment,
                'user_id' => Auth::user()->id,
                'section' => 'KAM-PUG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('inspection.add');
    }
}

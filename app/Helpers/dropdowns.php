<?php 

if (!function_exists('get_quarters_dropdown')) {
    function get_quarters_dropdown()
    {
        return [
            ['option'=> 'FIRST QUARTER', 'value'=> 'first_quarter'],
            ['option'=> 'SECOND QUARTER', 'value'=> 'second_quarter'],
            ['option'=> 'THIRD QUARTER', 'value'=> 'third_quarter'],
            ['option'=> 'FOURTH QUARTER', 'value'=> 'fourth_quarter']
        ];
    }
}

if (!function_exists('get_nature_of_accident_dropdown')) {
    function get_nature_of_accident_dropdown()
    {
        return [
            ['option'=> 'MAJOR ACCIDENT', 'value'=> 'major_accident'],
            ['option'=> 'MINOR ACCIDENT', 'value'=> 'minor_accident'],
            ['option'=> 'LEVEL CROSSING', 'value'=> 'level_crossing']
        ];
    }
}

if (!function_exists('get_responsible_designation_dropdown')) {
    function get_responsible_designation_dropdown()
    {
        return [
            ['option'=> 'NONE', 'value'=> 'none'],
            ['option'=> 'TRACK', 'value'=> 'track'],
            ['option'=> 'ROLLING STOCK', 'value'=> 'rolling_stock'],
            ['option'=> 'UNRESOLVED', 'value'=> 'unresolved'],
            ['option'=> 'HUMAN ERROR', 'value'=> 'human_error']
        ];
    }
}

if (!function_exists('get_operation_year_range_dropdown')) {
    function get_operation_year_range_dropdown()
    {
        return range(date("Y"), 1990);
    }
}

if (!function_exists('get_alphabet_range_dropdown')) {
    function get_alphabet_range_dropdown()
    {
        return range('A', "Z");
    }
}

if (!function_exists('get_department_dropdown')) {
    function get_department_dropdown()
    {
        return [
            ['option'=> 'ICT', 'value'=> 'ict', 'abbr' => 'IC'],
            ['option'=> 'TIRTEC', 'value'=> 'tirtec', 'abbr' => 'TR'],
            ['option'=> 'SAFETY', 'value'=> 'safety', 'abbr' => 'RS'],
            ['option'=> 'DRS', 'value'=> 'drs', 'abbr' => 'IC'],
            ['option'=> 'PUBLIC RELATION', 'value'=> 'public_relation', 'abbr' => 'PR'],
            ['option'=> 'PROCUREMENT MANAGEMENT', 'value'=> 'procurement_management' , 'abbr' => 'PM'],
            ['option'=> 'CORPORATE PLANNING', 'value'=> 'corporate_planning', 'abbr' => 'CP'],
            ['option'=> 'OPERATION', 'value'=> 'operation', 'abbr' => 'OP'],
            ['option'=> 'LEGAL SERVICES', 'value'=> 'legal_services', 'abbr' => 'LS'],
            ['option'=> 'INTERNAL AUDIT', 'value'=> 'internal_audit', 'abbr' => 'IA'],
            ['option'=> 'HUMAN RESOURCE', 'value'=> 'human_resource', 'abbr' => 'HR'],
            ['option'=> 'DST & E', 'value'=> 'dst_&_e', 'abbr' => 'ST'],
            ['option'=> 'FINANCE & ACCOUNTS', 'value'=> 'finace_&_acconts', 'abbr' => 'FA'],
            ['option'=> 'CIVIL & INFRASTRUCTURE', 'value'=> 'civil_&_infrastructure', 'abbr' => 'CE'],
        ];
    }
}

if (!function_exists('get_accident_subject_dropdown')) {
    function get_accident_subject_dropdown()
    {
        return [
            ['option'=> 'TROLLEY FAILURE', 'value'=> 'TROLLEY FAILURE', 'has_death' => 'yes'],
            ['option'=> 'DERAILMENT', 'value'=> 'DERAILMENT', 'has_death' => 'no'],
            ['option'=> 'LOCO FAILURE', 'value'=> 'LOCO FAILURE', 'has_death' => 'no'],
            ['option'=> 'DERAILMENT IN YARD', 'value'=> 'DERAILMENT IN YARD', 'has_death' => 'yes'],
            ['option'=> 'BROKEN/BUCKLED RAIL', 'value'=> 'BROKEN/BUCKLED RAIL', 'has_death' => 'no'],
            ['option'=> 'CAPSIZEMENT', 'value'=> 'CAPSIZEMENT', 'has_death' => 'no'],
            ['option'=> 'WASH AWAY', 'value'=> 'WASH AWAY', 'has_death' => 'no'],
            ['option'=> 'LOCO FAILURE', 'value'=> 'LOCO FAILURE', 'has_death' => 'no'],
            ['option'=> 'FOUND DEAD ON THE TRACK', 'value'=> 'FOUND DEAD ON THE TRACK', 'has_death' => 'no'],
            ['option'=> 'ROAD VEHICLE KNOCKED TROLL', 'value'=> 'ROAD VEHICLE KNOCKED TROLL', 'has_death' => 'no'],
            ['option'=> 'COLLISION IN YARD', 'value'=> 'COLLISION IN YARD', 'has_death' => 'no'],
            ['option'=> 'SHAURI MOYO GATE SMARSHED', 'value'=> 'SHAURI MOYO GATE SMARSHED', 'has_death' => 'no'],


            ['option'=> 'MOTOR VEHICLE KNOCKED TRAIN', 'value'=> 'MOTOR VEHICLE KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'DERAILMENT IN WORKSHOP', 'value'=> 'DERAILMENT IN WORKSHOP', 'has_death' => 'no'],
            ['option'=> 'PERSON KNOCKED TROLLEY', 'value'=> 'PERSON KNOCKED TROLLEY', 'has_death' => 'no'],
            ['option'=> 'STONE PLACED ON THE TRACK', 'value'=> 'STONE PLACED ON THE TRACK', 'has_death' => 'no'],
            ['option'=> 'WAGONS RUNAWAY', 'value'=> 'WAGONS RUNAWAY', 'has_death' => 'no'],
            ['option'=> 'HOLE NEAR THE TRACK', 'value'=> 'HOLE NEAR THE TRACK', 'has_death' => 'no'],
            ['option'=> 'TROLLEY KNOCKED BY TRESSPASSER', 'value'=> 'TROLLEY KNOCKED BY TRESSPASSER', 'has_death' => 'no'],
            ['option'=> 'DONKEY CART KNOCKED TRAIN', 'value'=> 'DONKEY CART KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'TROLLEY KNOCKED BY A CHILD', 'value'=> 'TROLLEY KNOCKED BY A CHILD', 'has_death' => 'no'],
            ['option'=> 'UNKNOWN PERSON ATTACKED LOCO DRIVER', 'value'=> 'UNKNOWN PERSON ATTACKED LOCO DRIVER', 'has_death' => 'no'],
            ['option'=> 'POINTS NO.2 DEFECTIVE', 'value'=> 'POINTS NO.2 DEFECTIVE', 'has_death' => 'no'],
            ['option'=> 'HUGE BOULDERS FOUND OVER THE TRACK', 'value'=> 'HUGE BOULDERS FOUND OVER THE TRACK', 'has_death' => 'no'],

            ['option'=> 'ANIMALS KNOCKED TRAIN', 'value'=> 'ANIMALS KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'MECHANICAL DEFECTS', 'value'=> 'MECHANICAL DEFECTS', 'has_death' => 'no'],
            ['option'=> 'MOTOR CYCLE KNOCKED TRAIN', 'value'=> 'MOTOR CYCLE KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'TANESCO CABLE HANGING NEAR', 'value'=> 'TANESCO CABLE HANGING NEAR', 'has_death' => 'no'],
            ['option'=> 'FAILED TO PROCEED DUE TO LOADED CRANE', 'value'=> 'FAILED TO PROCEED DUE TO LOADED CRANE', 'has_death' => 'no'],
            ['option'=> 'LORRY TRAILER DETACHED ON THE TRACK', 'value'=> 'LORRY TRAILER DETACHED ON THE TRACK', 'has_death' => 'no'],
            ['option'=> 'SAND OVER THE TRACK', 'value'=> 'SAND OVER THE TRACK', 'has_death' => 'no'],
            ['option'=> 'DONKEY CART KNOCKED TRAIN', 'value'=> 'DONKEY CART KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'OVER GAUGE LOAD FAILED TO PASS ON THE BRIDGE', 'value'=> 'OVER GAUGE LOAD FAILED TO PASS ON THE BRIDGE', 'has_death' => 'no'],
            ['option'=> 'WATER COVERED AT GATE TPA MAI YARD', 'value'=> 'WATER COVERED AT GATE TPA MAI YARD', 'has_death' => 'no'],
            ['option'=> 'LORRY KNOCKED TRAIN', 'value'=> 'LORRY KNOCKED TRAIN', 'has_death' => 'no'],
            ['option'=> 'TRAIN ENTERED INTO BLOCK SECTION WITHOUT PAPER LINE CLEAR', 'value'=> 'TRAIN ENTERED INTO BLOCK SECTION WITHOUT PAPER LINE CLEAR', 'has_death' => 'no'],

        ];
    }
}  
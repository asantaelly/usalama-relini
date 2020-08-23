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
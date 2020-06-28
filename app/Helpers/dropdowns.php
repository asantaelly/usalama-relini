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
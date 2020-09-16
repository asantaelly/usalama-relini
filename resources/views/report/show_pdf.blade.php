<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <div class=" p-md-5">
        <div class="row align-items-center mb-5">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <h5 align="center"><strong>TANZANIA RAILWAY CORPORATION</strong></h5>
                <h5 class="text-sm"align="center"><strong>HEADQUATER CONTROL</strong></h5>
                <h5 align="center"><strong>{{$data[0]['report_name']}}</strong></h5>
            </div>
        </div>
        <br>
        <div class="row card card-body pt-5 mb-5 mt-5">
            <div class="col-12">
                <!-- Table -->
                <div class="table-responsive">
                <table class="table table-striped mb-0" style="font-size: 10px">
                    <thead>
                    <tr>
                        <th class="px-1 bg-transparent border-top-0">S/N</th>
                        @if (isset($data[0]['accident_subject']) && !is_null($data[0]['accident_subject']))
                        <th class="px-1 bg-transparent border-top-0">ACCIDENT SUBJECT</th> 
                        @endif
                        @if (isset($data[0]['cause_of_accident']) && !is_null($data[0]['cause_of_accident']))
                        <th class="px-1 bg-transparent border-top-0">CAUSE OF ACCIDENT</th> 
                        @endif
                        @if (isset($data[0]['belonged_quarter']) && !is_null($data[0]['belonged_quarter']))
                        <th class="px-1 bg-transparent border-top-0">BELONGED QUARTER</th> 
                        @endif
                        @if (isset($data[0]['operation_year']) && !is_null($data[0]['operation_year']))
                        <th class="px-1 bg-transparent border-top-0">OPERATION YEAR</th> 
                        @endif
                        @if (isset($data[0]['section_name']) && !is_null($data[0]['section_name']))
                        <th class="px-1 bg-transparent border-top-0">SECTION NAME</th> 
                        @endif
                        @if (isset($data[0]['section_between']) && !is_null($data[0]['section_between']))
                        <th class="px-1 bg-transparent border-top-0">SECTION BETWEEN</th> 
                        @endif
                        @if (isset($data[0]['section_rail_size']) && !is_null($data[0]['section_rail_size']))
                        <th class="px-1 bg-transparent border-top-0">SECTION RAIL SIZE</th> 
                        @endif
                        @if (isset($data[0]['section_kilometers']) && !is_null($data[0]['section_kilometers']))
                        <th class="px-1 bg-transparent border-top-0">SECTION KILOMETERS</th> 
                        @endif
                        @if (isset($data[0]['loco_trolley']) && !is_null($data[0]['loco_trolley']))
                        <th class="px-1 bg-transparent border-top-0">LOCO / TROLLEY</th> 
                        @endif
                        @if (isset($data[0]['resposible_designation']) && !is_null($data[0]['resposible_designation']))
                        <th class="px-1 bg-transparent border-top-0">RESPOSIBLE DESIGNATION</th> 
                        @endif
                        @if (isset($data[0]['death_nature']) && !is_null($data[0]['death_nature']))
                        <th class="px-1 bg-transparent border-top-0">NATURE OF DEATH</th> 
                        @endif
                        @if (isset($data[0]['injury_nature']) && !is_null($data[0]['injury_nature']))
                        <th class="px-1 bg-transparent border-top-0">NATURE OF INJURY</th> 
                        @endif
                        @if (isset($data[0]['total']) && !is_null($data[0]['total']))
                        <th class="px-1 bg-transparent border-top-0">COUNT</th> 
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr>
                            <td class="px-1"> {{$loop->index +1}} </td>
                            @if (isset($data[0]['accident_subject']) && !is_null($data[0]['accident_subject']))
                            <td class="px-1">{{ is_null($value['accident_subject'])? '--': $value['accident_subject'] }}</td> 
                            @endif
                            @if (isset($data[0]['cause_of_accident']) && !is_null($data[0]['cause_of_accident']))
                            <td class="px-1">{{ is_null($value['cause_of_accident'])? '--': $value['cause_of_accident'] }}</td> 
                            @endif
                            @if (isset($data[0]['belonged_quarter']) && !is_null($data[0]['belonged_quarter']))
                            <td class="px-1">{{ is_null($value['belonged_quarter'])? '--': str_replace( "_", " ", strtoupper($value['belonged_quarter'])) }}</td> 
                            @endif
                            @if (isset($data[0]['operation_year']) && !is_null($data[0]['operation_year']))
                            <td class="px-1">{{ is_null($value['operation_year'])? '--': $value['operation_year'] }}</td> 
                            @endif
                            @if (isset($data[0]['section_name']) && !is_null($data[0]['section_name']))
                            <td class="px-1">{{ is_null($value['section_name'])? '--': $value['section_name'] }}</td> 
                            @endif
                            @if (isset($data[0]['section_between']) && !is_null($data[0]['section_between']))
                            <td class="px-1">{{ is_null($value['section_between'])? '--': $value['section_between'] }}</td> 
                            @endif
                            @if (isset($data[0]['section_rail_size']) && !is_null($data[0]['section_rail_size']))
                            <td class="px-1">{{ is_null($value['section_rail_size'])? '--': $value['section_rail_size'] }}</td> 
                            @endif
                            @if (isset($data[0]['section_kilometers']) && !is_null($data[0]['section_kilometers']))
                            <td class="px-1">{{ is_null($value['section_kilometers'])? '--': $value['section_kilometers'] }}</td> 
                            @endif
                            @if (isset($data[0]['loco_trolley']) && !is_null($data[0]['loco_trolley']))
                            <td class="px-1">{{ is_null($value['loco_trolley'])? '--': $value['loco_trolley'] }}</td> 
                            @endif
                            @if (isset($data[0]['resposible_designation']) && !is_null($data[0]['resposible_designation']))
                            <td class="px-1">{{ is_null($value['resposible_designation'])? '--': $value['resposible_designation'] }}</td> 
                            @endif
                            @if (isset($data[0]['death_nature']) && !is_null($data[0]['death_nature']))
                            <td class="px-1">
                                <ul>
                                @foreach ($value['death_nature'] as $death)
                                <li>{{ $death->nature}} &nbsp; ({{ $death->pivot->number}} people)</li>
                                @endforeach
                                </ul> 
                            </td> 
                            @endif
                            @if (isset($data[0]['injury_nature']) && !is_null($data[0]['injury_nature']))
                            <td class="px-1">
                                <ul>
                                @foreach ($value['injury_nature'] as $injury)
                                <li>{{ $injury->nature}} &nbsp; ({{ $injury->pivot->number}} people)</li>
                                @endforeach
                                </ul> 
                            </td> 
                            @endif
                            @if (isset($data[0]['total']) && !is_null($data[0]['total']))
                            <td class="px-1"> {{ is_null($value['total'])? '--': $value['total'] }}</td> 
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
                </div>
                
            <h6 class="mt-5" align="center"><strong>Report Generated By {{auth()->user()->name}}</strong></h6>
        </div>
        </div>
    </div>
</body>
</html>


    
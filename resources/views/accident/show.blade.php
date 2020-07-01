@extends('dashboard.index')

@section('title')
		Accident Log
@endsection

@section('content')
    <div class="card card-body p-md-5">
        <div class="row align-items-center mb-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <h5>TANZANIA RAILWAY CORPARATION</h5>
                <small class="" align="center"><strong>ACCIDENT LOGSHEET</strong></small><br>
                <small class=""align="center"><strong>HEADQUATER CONTROL</strong></small>
            </div>
            <div class="col-sm-6 text-sm-right">
                <h6 class="d-inline-block m-0 d-print-none">Reference Number</h6>
                <span class="badge badge-pill badge-success ml-3">{{$accident->reference_number}}</span>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12 col-md-12">
            <h6 class="text-sm"><strong>Reported by :</strong> <u> {{auth()->user()->name}}</u> &nbsp; <strong>No :</strong> <u>{{$accident->created_at}}</u></h6>
            <h6 class=""><strong>Time of Accident :</strong> <u>{{$accident->time_of_accident}}</u> &nbsp; <strong>Place :</strong> <u>{{$accident->occured_at}}</u> &nbsp; <strong>Section :</strong> <u>{{$accident->section->code_name}}</u> </h6>
            <h6 class=""><strong>Train/Loco(s) :</strong> <u>{{$accident->train}}</u> &nbsp; <strong>Fuel Balance:</strong> <u>{{$accident->fuel_balance}}</u> &nbsp; <strong>TL :</strong> <u>{{$accident->train_load}}</u> </h6>
            <h6 class=""><strong>Driver(s) :</strong> <u>{{$accident->driver_name}}</u> &nbsp; <strong>Guard(s):</strong> <u>{{$accident->guard_name}}</u> </h6>
            <h6 class=""><strong>Received From Control :</strong> <u>{{$accident->received_from_control_location}}</u> &nbsp; <strong>At :</strong> <u>{{$accident->received_from_control_time}}</u> </h6>
            </div>
        </div>
        <div class="row mb-2 ml-1">
            <h6 class=""><strong>SUBJECT:-</strong> <u> {{$accident->accident_subject}}</u></h6>
        </div>
        <div class="row mb-2">
            <div class="col-lg-4 col-md-4">
                <h6 class=""><strong>BRIEF PARTICULARS</strong></h6>
            </div>
            <div class="col-lg-8 col-md-8">
               <p class="text-sm">{{$accident->brief_particulars}}</p> 
            </div> 
        </div>
        <div class="row mb-2">
            <div class="col-lg-4 col-md-4">
                <h6 class=""><strong>DAMAGES</strong></h6>
            </div>
            <div class="col-lg-8 col-md-8">
               <p class="text-sm">{{$accident->damages}}</p> 
            </div> 
        </div>
        <div class="row mb-2">
            <div class="col-lg-4 col-md-4">
                <h6 class=""><strong>CAUSE OF ACCIDENT</strong></h6>
            </div>
            <div class="col-lg-8 col-md-8">
               <p class="text-sm">{{$accident->cause_of_accident}}</p> 
            </div> 
        </div>
        <div class="row mb-5">
            <div class="col-lg-4 col-md-4">
                <h6 class=""><strong>ASSISTANCE REQUIRED</strong></h6>
            </div>
            <div class="col-lg-8 col-md-8">
               <p class="text-sm">{{$accident->brief_particulars}}</p> 
            </div> 
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <h5 align="center">OFFICERES CONCERNED</h5>
                <!-- Table -->
                <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th class="px-0 bg-transparent border-top-0">S/N</th>
                        <th class="px-0 bg-transparent border-top-0">TITLE</th>
                        <th class="px-0 bg-transparent border-top-0">MOBILE PHONE NO.</th>
                        <th class="px-0 bg-transparent border-top-0">EXT NO.</th>
                        <th class="px-0 bg-transparent border-top-0">NAME</th>
                        <th class="px-0 bg-transparent border-top-0">TIME</th>
                        <th class="px-0 bg-transparent border-top-0">REMARKS</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($officers as $officer)
                        <tr>
                        <td class="px-0">{{$loop->index+1}}</td>
                        <td class="px-0">{{$officer->title}}</td>
                        <td class="px-0">
                            @foreach ($officer->officer_contacts as $contact)
                            {{$contact->phone_no}} 
                            @if ($loop->last)
                                &nbsp;
                            @else
                             /
                            @endif  
                          @endforeach
                        </td>
                        <td class="px-0">{{$officer->ext_no}}</td>
                        <td class="px-0">{{$officer->name}}</td>
                        <td><span class="h6 text-sm">--</span></td>
                        <td class="px-0"><span class="h6 text-sm">--</span></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
        </div>
        </div>
        <div class="row mt-5">
        <div class="col-12 col-md-12">
            <h5 align="center">PROGRESS REPORT</h5>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th class="px-1 bg-transparent border-top-0">DATE/TIME</th>
                        <th class="px-5 bg-transparent border-top-0">PARTICULARS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($accident->progress as $progress)
                        <tr>
                            <td class="px-1">
                            <span class="h6 text-sm">{{$progress->time}}</span>
                            </td>
                            <td class="px-5">
                                {{$progress->particulars}}
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
        </div>
        </div>
    </div>
@endsection
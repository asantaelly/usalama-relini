@extends('dashboard.index')

@section('title')
  <div class="ml-0">
    Training Attendance
  </div>
@endsection


@section('content')
    <div class="row">
        <div class="col-0"></div>
        <div class="col-12">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-light">
                    Attendance Register
                </div>
                <div class="card-body">
                    
                    <div class="row ml-2">

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-2">
                                    <h5>Title : </h5>
                                </div>

                                <div class="col-lg-10">
                                    <p class="ml-2"> 
                                        <b>
                                            {{ $event->title }}
                                        </b>
                                    </p>
                                </div>
                                  
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <h5>Attendees: </h5>
                                </div>
                                <div class="col-lg-10">
                                    <p class="ml-2">
                                        <b>
                                            {{ ucfirst($event->role->name.'s\'') }}
                                        </b>
                                    </p>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <h5>Venue : </h5>
                                </div>
                                <div class="col-lg-10">
                                    <p class="ml-2">
                                        <b>
                                            {{ $event->venue }}
                                        </b>
                                    </p>
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col-lg-2">
                                    <h5>Time :</h5>
                                </div>

                                <div class="col-lg-10">
                                    <p class="ml-2">
                                        <b>
                                            {{ date("F j, Y, g:i a", strtotime($event->training_date)) }}
                                        </b>
                                    </p>
                                </div>
    
                            </div>

                            <div class="">
                               <h5>Description</h5>
                               <p class="row ml-1">
                                   {{ ucfirst($event->description) }}
                               </p>
                            </div>

                            
                        </div>
                        <div class="col-lg-3">
                            <div class="">
                                <h5>Event Status</h5>
                                <p class="row ml-2">
                                    @if ($event->status == true)
                                    <button type="button" class="btn btn-success shadow">
                                        Completed
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary shadow">
                                        Waiting...
                                    </button>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row ml-2"></div>

                    <div class="row no-gutters mt-2">
                        
                        <div class="card col-lg-12 border-0 mb-4">
                            <div class="card-header rounded py-3 text-center">
                              <h6 class="m-0 font-weight-bold text-dark">List of Attendees</h6>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('store.attendance')}}" method="POST" id="update_status">
                                @csrf
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>User Status</th>
                                      <th>Event Status</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Status</th>
                                        <th>Event Status</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>

                                        @foreach ($event->role->users as $index => $user)
                                            <tr>

                                            <td>
                                            <b> {{ ucfirst($user->name) }}</b>
                                            </td>

                                            <td>
                                            @if ($user->status == true)
                                            <button type="button" class="btn btn-success shadow">
                                                Active
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-dark shadow">
                                                Inactive
                                            </button>
                                            @endif
                                            </td>

                                            <td>

                                                @if ($user->getAttendanceStatus($event->id) == false)
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        
                                                        <label class="btn btn-success">
                                                            <input type="radio" name="attendance[{{$index}}][status]" value="1" id="status{{$event->id}}"> Attended
                                                        </label>

                                                        <label class="btn btn-success active rounded-right">
                                                            <input type="radio" name="attendance[{{$index}}][status]" value="0" id="status{{$event->id}}" checked> Missed
                                                        </label>

                                                        <input type="hidden" name="users[{{$index}}][id]" value="{{ $user->id }}">
                                                        <input type="hidden" name="training_id" value="{{ $event->id }}">
                                                    </div>
                                                @else
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                        <label class="btn btn-success active">
                                                            <input type="radio" name="attendance[{{$index}}][status]" value="1" id="status{{$event->id}}" checked> Attended
                                                        </label>

                                                        <label class="btn btn-success rounded-right">
                                                            <input type="radio" name="attendance[{{$index}}][status]" value="0" id="status{{$event->id}}"> Missed
                                                        </label>

                                                        <input type="hidden" name="users[{{$index}}][id]" value="{{ $user->id }}">
                                                        <input type="hidden" name="training_id" value="{{ $event->id }}">
                                                    </div>
                                                @endif

                                            </td>
                                            </tr>
                                        @endforeach
                                  </tbody>
                                </table>
                              </div>
                              <div class="row">

                            @if ($event->status == FALSE)
                                 
                                <div class="text-left">
                                    <button type="submit" class="btn btn-info btn-icon-split m-1">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span class="text">Submit Attendance</span>
                                    </button>
                                </div>
                            </form>

                                {{--  Button to close Training Event --}}
                                <div class="text-left">
                                    <form action="{{ route('close.event', ['id' => $event->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-icon-split m-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times-circle"></i>
                                            </span>
                                            <span class="text text-dark">Close Event</span>
                                        </button>
                                    </form>
                                    
                                </div>
                            @else
                                
                                <div class="text-left">
                                    <button type="submit" class="btn btn-danger btn-icon-split m-1" disabled>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <span class="text">Event Closed</span>
                                    </button>
                                </div>

                            @endif 
                            </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-1"></div>
    </div>
    <script>
        window.onload = function(){

        $("#no_user_for_now").submit(function(event){
            event.preventDefault();

            var $form = $(this)
            var modal = document.getElementById("assignModal");

            $.ajax({
                type: "POST",
                url: $form.attr("action"),
                data: $('#assign_form').serialize(),
                dataType: "json",
                processData: false,
                success: function(data){
                    console.log(data)
                    modal.style.display = "none";
                },
                error: function (err){
                    console.log(err)
                }
            });
        });
    }
    </script>
    
@endsection
@extends('dashboard.index')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-light">
                    Event Details
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


                    <div class="row ml-2">

                            {{-- Delete Event --}}
                            <a href="#" class="btn btn-danger btn-icon-split m-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>

                            {{-- Edit Event --}}
                            <a href="{{ route('training.edit', [ 'id' => $event->id ])}}" class="btn btn-warning btn-icon-split m-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-1"></div>
    </div>
    <script>
        window.onload = function(){

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $("#assign_form").submit(function(event){
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
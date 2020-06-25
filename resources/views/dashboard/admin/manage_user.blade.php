@extends('dashboard.index')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <div class="card shadow">
                <div class="card-header text-center">
                    {{ ucfirst($user->name.'\'s')}} Profile
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th scope="row">Name</th>
                          <td>{{ ucfirst($user->name)}}</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Registered at</th>
                          <td>{{ $user->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Role(s)</th>
                            <td>
                            @if (count($user->roles) <= 1)
                                {{ ucfirst($user->roles[0]->name) }}
                            @else
                                @foreach ($user->roles as $role)
                                    <b>{{ ucfirst($role->name) }}</b> |
                                @endforeach
                            @endif
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            @if ($user->status == false)
                                <td> Inactive</td>
                            @else
                                <td> Active </td>
                            @endif
                          </tr>
                      </tbody>
                    </table>

                    <div class="row ml-2">
                        {{-- Assign role --}}
                        <a href="#" class="btn btn-primary btn-icon-split m-1" data-toggle="modal" data-target="#assignModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Assign Role</span>
                            </a>

                            <!-- Assigning role Modal -->
                            <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Assigning roles to {{ ucfirst($user->name) }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Current user roles: 
                                        @if (count($user->roles) <= 1)
                                            <span>{{ ucfirst($user->roles[0]->name) }}</span>
                                        @else
                                            @foreach ($user->roles as $role)
                                                <b>{{ ucfirst($role->name) }}</b> |
                                            @endforeach
                                        @endif
                                        <hr>
                                        
                                        <form class="m-2" method="POST" action="{{ route('assign.role', [ 'id' => $user->id])}}" id="assign_form">
                                            @csrf
                                                @if (empty($user->userRole()))
                                                    <span>
                                                        <b>User has all available roles</b>
                                                    </span>
                                                @else
                                                <label>Select roles to assign to user:</label>        
                                                    @foreach ($user->userRole() as $index => $role)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="roles[{{ $index+1}}][id]" value="{{ $role->id }}" id="defaultCheck{{ $role->id }}">
                                                            <label class="form-check-label" for="defaultCheck{{ $role->id }}">
                                                                {{ ucfirst($role->name) }}
                                                            </label>
                                                        </div>
                                                    @endforeach 
                                                @endif
                                            
                                              <hr>
                                              @if (empty($user->userRole()))
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              @else
                                                <button type="submit" class="btn btn-primary mr-0">Assign role(s)</button>
                                              @endif
                                              
                                          </form>
                                          
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- End of Modal --}}




                            {{-- Deactivate user --}}
                            @if ($user->status == true)
                                <a href="#" class="btn btn-warning btn-icon-split m-1">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Deactivate</span>
                                </a>
                            @else
                                <a href="#" class="btn btn-success btn-icon-split m-1">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Activate</span>
                                </a>
                                
                            @endif
                            

                            {{-- Delete user --}}
                            <a href="#" class="btn btn-danger btn-icon-split m-1">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                            </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
    <script>

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

    </script>
    
@endsection
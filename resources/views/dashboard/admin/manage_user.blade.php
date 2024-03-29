@extends('dashboard.index')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-light">
                    {{ ucfirst($user->name.'\'s')}} Profile
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th scope="row">First Name</th>
                          <td>{{ ucfirst($user->name)}}</td>
                        </tr>

                        @if ($user->profile != NULL )
                            <tr>
                                <th scope="row">Last Name</th>
                                <td>{{ ucfirst($user->profile->last_name)}}</td>
                            </tr>
                        @endif
                        

                        <tr>
                          <th scope="row">Email</th>
                          <td>{{ $user->email }}</td>
                        </tr>

                        @if ($user->profile != NULL )
                            <tr>
                                <th scope="row">Contact </th>
                                <td>{{ ucfirst($user->profile->phone_number)}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ ucfirst($user->profile->address)}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Competence</th>
                                <td>{{ ucfirst($user->profile->competence)}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Medical</th>
                                <td>{{ ucfirst($user->profile->medical)}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Education</th>
                                <td>
                                    <ul>
                                        @foreach ($user->profile->educations as $education)
                                                <li>{{ $education->level }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Qualifications</th>
                                <td>
                                    <ul>
                                    @foreach ($user->profile->qualifications as $quality)
                                            <li>{{ $quality->quality }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>

                        @endif

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
                    </div>

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
                                    <div class="modal-header bg-primary text-light">
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
                                              <div class="text-right">
                                                @if (empty($user->userRole()))
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary mr-0">Assign role(s)</button>
                                                @endif
                                              </div>  
                                          </form>
                                          
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- End of Modal --}}




                            {{-- Deactivate user --}}
                            @if ($user->status == true)
                                <a href="#" class="btn btn-secondary btn-icon-split m-1">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Deactivate</span>
                                </a>
                            @else

                            {{-- Activate user --}}
                                <a href="#" onclick="alert('Are you sure, You want to activate this account?')" class="btn btn-success btn-icon-split m-1">
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

                            <a href="{{ route('edit.user', ['id' => $user->id])}}" class="btn btn-warning btn-icon-split m-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-2"></div>
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
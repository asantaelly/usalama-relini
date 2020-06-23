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
                            @if (count($user->roles) <= 1)
                                <td>{{ ucfirst($user->roles[0]->name) }}</td>
                            @else
                                @foreach ($user->roles as $role)
                                    <td>{{ '|'.ucfirst($role->name) }}</td>
                                @endforeach
                            @endif
                            
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            @if ($user->status == false)
                                <td> Inactive</td>
                            @else
                                <td> Active </td>
                            @endif
                          </tr>
                        <tr>
                            <td>
                                {{-- Assign role --}}
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Assign Role</span>
                                    </a>

                                    {{-- Deactivate user --}}
                                    @if ($user->status == true)
                                        <a href="#" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="text">Deactivate</span>
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-succes btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Activate</span>
                                        </a>
                                        
                                    @endif
                                    

                                    {{-- Delete user --}}
                                    <a href="#" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                    </a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
    
@endsection
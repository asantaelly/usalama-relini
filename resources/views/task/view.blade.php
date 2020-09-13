@extends('dashboard.index')

@section('title')
		Task Details 
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
                <div class="btn-group">
                    <a href="{{ route('task.edit', ['id' => $task_view->id ]) }}" class="btn btn-primary btn-sm"> edit </a>
                    <a class="btn btn-default btn-sm" href="{{ route('task.index') }}">Go Back</a>
                </div>
            </div>  
        </div>
                <h5 align="center" class="mb-4">{{ $task_view->task_title }}</h5>
                
                <p class="mb-4">{!! $task_view->task !!}</p>

                <div class="col-md-12 mb-4">
                    <div class="row">
                        <hr>
                        @if( count($images_set) > 0 ) 
                            <div class="col-md-6">
                
                                <table>
                                    <tr>
                                    <td class="panel-heading">Uploaded Images</td>
                                    <td class="panel-body">
                                        <ul id="images_col">
                                            @foreach ( $images_set as $image )
                                                <li class="m-2"> 
                                                    <a href="<?php echo asset("images/$image") ?>" data-lightbox="images-set">
                                                        <img class="img-responsive img-thumbnail" width="100" height="100" src="<?php echo asset("images/$image") ?>">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    </tr>
                                    
                                </table>
                
                            </div>
                        @endif
                        @if( count($files_set) > 0 ) 
                            <div class="col-md-6">
                
                                <table>
                                    <tr>
                                        <td class="panel-heading"> Uploaded Files</td>
                                    <td class="panel-body">
                                        <ul id="images_col">
                                            @foreach ( $files_set as $file )
                                                <li> 
                                                    <a target="_blank" href="<?php echo asset("images/$file") ; ?>">{{ $file }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Table -->
                <div class="table-responsive">
                <table class="table mb-0">
                    <tbody>
                    <tr>
                        <td class="px-0">
                        <span class="h6 text-sm">Project</span>
                        </td>
                        <td class="px-0">
                        <a href="{{ route('task.list', [ 'projectid' => $task_view->project->id ]) }}">{{ $task_view->project->project_name }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-0">
                        <span class="h6 text-sm">Priority</span>
                        </td>
                        <td class="px-0">
                            @if ( $task_view->priority == 0 )
                                <span class="label label-info">Normal</span>
                            @else
                                <span class="label label-danger">High</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="px-0">
                        <span class="h6 text-sm">Created</span>
                        </td>
                        <td class="px-0">
                            {{ $formatted_from }} 
                        </td>
                    </tr>
                    <tr>
                        <td class="px-0">
                        <span class="h6 text-sm">Due Date</span>
                        </td>
                        <td class="px-0">
                            {{ $formatted_to }} 
                        </td>
                    </tr>
                    <tr>
                        <td class="px-0">
                        <span class="h6 text-sm">Status</span>
                        </td>
                        <td class="px-0">
                            @if ( $task_view->completed == 0 )
                            <span class="label label-warning">Open</span>
                            @if ( $is_overdue )
                                <span class="label label-danger">Overdue</span>
                            @else
                                <p><br>{{ $diff_in_days }} days left to complete this task</p>
                            @endif                
                            @else
                                <span class="label label-success">Closed</span>
                            @endif
                        </td>
                    </tr>
                    
                    </tbody>
                </table>
                </div>
        </div>
        </div>
    </div>
@endsection


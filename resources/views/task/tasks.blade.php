@extends('dashboard.index')

@section('title')
  All Tasks
@endsection

@section('menus')
<div class="row mb-5">
    <a href="{{route('task.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Create New Task</span>
      </a>
    </div>
    

@endsection

@section('content')

<!--   /views/task/task/tasks.blade.php   -->
<div class="row mb-3">
    <div class="col-md-6 ">
    </div>

    <div class="col-md-6">
        <form action="{{ route('task.search') }}" class="navbar-form" role="search" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search in Tasks..." name="search_task">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search">
                            <span class="sr-only">Search...</span>
                        </span>
                    </button>
                </span>
            </div>
        </form>
    </div> 

</div>

<div class="table-responsive">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Created At</th>
        <th><a href="{{ route('task.sort', [ 'key' => 'task' ]) }}">Task Title <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span> </a></th>
        <th>Assigned To / Project</th>
        <th><a href="{{ route('task.sort', [ 'key' => 'priority' ]) }}">Priority <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span> </a></th>
        <th><a href="{{ route('task.sort', [ 'key' => 'completed' ]) }}">Status <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span> </a></th>
        <th>Actions</th>
      </tr>
    </thead>

@if ( !$tasks->isEmpty() ) 
    <tbody>
    @foreach ( $tasks as $task)
      <tr>
        <td>{{ Carbon\Carbon::parse($task->created_at)->format('m-d-Y') }}</td>
        <td>{{ $task->task_title }} </td>

        <td>
         
            @foreach( $users as $user) 
                @if ( $user->id == $task->user_id )
                    <a href="{{ route('user.list', [ 'id' => $user->id ]) }}">{{ $user->name }}</a>
                @endif
            @endforeach
            <span class="label label-jc">{{ $task->project->project_name }}</span>

        </td>

        <td>
            @if ( $task->priority == 0 )
                <span class="label label-info">Normal</span>
            @else
                <span class="label label-danger">High</span>
            @endif
        </td>
        <td>
            @if ( !$task->completed )
                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning btn-sm"> Mark as completed</a>
                <span class="label label-danger">{{ ( $task->duedate < Carbon\Carbon::now() )  ? "!" : "" }}</span>
            @else
                <span class="label label-success">Completed</span>
            @endif
  
            

        </td>
        <td>
            <a href="{{ route('task.view', ['id' => $task->id]) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-eye"></i></a>
            <!-- <a href="{{ route('task.edit', ['id' => $task->id]) }}" class="btn btn-primary"> edit </a>  -->
            <a href="{{ route('task.delete', ['id' => $task->id]) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>

        </td>
      </tr>

    @endforeach
    </tbody>

    {{ $tasks->links() }}


@else 
    <p><em>There are no tasks assigned yet</em></p>
@endif


</table>
</div>


@stop
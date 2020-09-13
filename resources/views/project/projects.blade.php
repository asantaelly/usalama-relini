@extends('dashboard.index')

@section('title')
  Active Project List
@endsection

@section('menus')
<div class="row mb-5">
  <div class="new_project">
    <button type="button" class="btn btn-primary btn-icon-split btn-sm mr-3" data-toggle="modal" data-target="#myModal">
		<span class="icon text-white-50">
      <i class="fas fa-plus"></i>
		</span>
		<span class="text">Add New Project</span>
    </button>
  </div>
</div>

@endsection

@section('content')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-small">Enter Project Title</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="project_form" action="{{ route('project.store') }}" method="POST">
            {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" id="project" name="project">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <input class="btn btn-primary btn-sm" type="submit" value="Submit" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        </form>
      </div>

    </div>

  </div>
</div>
<!--  END modal  -->



<div class="table-responsive">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Project Name</th>
        <th>Project Tasks List</th>
        <th>Actions</th>
      </tr>
    </thead>

@if ( !$projects->isEmpty() ) 
    <tbody>
    @foreach ( $projects  as $project)
      <tr>
        <td>{{ $project->project_name }} </td>
        <td>
           <a href="{{ route('task.list', [ 'projectid' => $project->id ]) }}">List all tasks</a>
        </td>
        <td>
          <a class="btn btn-primary btn-circle btn-sm" href="{{ route('project.edit', [ 'id' => $project->id ]) }}"><i class="fas fa-edit"></i></a>          
          <a class="btn btn-danger btn-circle btn-sm" href="{{ route('project.delete', [ 'id' => $project->id ]) }}" Onclick="return ConfirmDelete();"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;
        </td>

      </tr>

    @endforeach
    </tbody>
@else 
    <p><em>There are no tasks assigned yet</em></p>
@endif


</table>
</div>




@stop


<script>

function ConfirmDelete()
{
  var x = confirm("Are you sure? Deleting a Project will also delete all tasks associated with this project");
  if (x)
      return true;
  else
    return false;
}




</script>  

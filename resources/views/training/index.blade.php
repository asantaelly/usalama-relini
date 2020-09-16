@extends('dashboard.index')

@section('title')
  <div class="ml-2">
    Training Schedule
  </div>
@endsection

@section('menus')
  <div class="row ml-2">
    <a href="{{ route('training.create')}}" class="btn btn-dark btn-icon-split btn-sm mr-3">
      <span class="icon text-light">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text text-light">Add Training</span>
    </a>
  </div>
  <br/>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3 text-center">
    <h6 class="m-0 font-weight-bold text-primary">List of Training Events</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Attendees</th>
            <th>Venue</th>
            <th>Time of Event</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Title</th>
            <th>Attendees</th>
            <th>Venue</th>
            <th>Time of Event</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>


          @foreach ($events as $event)
            <tr>
              <td>
              <a href="{{ route('training.show', ['id'=>$event->id])}}">{{ ucfirst($event->title) }}</a>
            </td>
            <td>
              <b>{{ ucfirst($event->role->name.'s\'') }}</b>
            </td>
            <td>
                {{ $event->venue}}
            </td>
              <td> 
                  {{ date("F j, Y, g:i a", strtotime($event->training_date)) }}
                </td>
              <td>
                @if ($event->status == true)
                  <button type="button" class="btn btn-success shadow">
                      Completed
                  </button>
                @else
                  <button type="button" class="btn btn-danger shadow">
                      Incomplete
                  </button>
                @endif
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
<style>
    /* unvisited link */
a:link {
  color: grey;
  text-decoration: none;
}

/* visited link */
a:visited {
  color: grey;
  text-decoration: none;
}

/* mouse over link */
a:hover {
  color: blue;
  text-decoration: none;
}

/* selected link */
a:active {
  color: blueviolet;
  text-decoration: none;
}
</style>
@endsection


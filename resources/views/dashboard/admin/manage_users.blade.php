@extends('dashboard.index')




@section('title')
  <div class="ml-2">
    User Management
  </div>
@endsection

@section('menus')
  <div class="row ml-2">
    <a href="{{ route('create.user')}}" class="btn btn-dark btn-icon-split btn-sm mr-3">
      <span class="icon text-light">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text text-light">Add Critical Workers</span>
    </a>


    {{-- <a href="{{route('accident.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
        <span class="icon text-light">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-light">Add Critical Worker</span>
      </a> --}}
  </div>
  <br/>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3 text-center">
    <h6 class="m-0 font-weight-bold text-primary">System Users</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Role(s)</th>
            <th>Registered at</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Role(s)</th>
            <th>Registered at</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>


          @foreach ($users as $user)
            <tr>
              <td>
              <a href="{{ route('manage.user', [ 'id' => $user->id]) }}">{{ ucfirst($user->name) }}</a>
            </td>
            <td>
            @if (count($user->roles) <= 1)
              {{ ucfirst($user->roles[0]->name) }}
            @else
              @foreach ($user->roles as $role)
                  <b>{{ ucfirst($role->name) }}</b> |
              @endforeach
            @endif
            </td>
              <td> {{ $user->created_at->toFormattedDateString() }}</td>
              <td>
                @if ($user->status == true)
                  <button type="button" class="btn btn-success shadow">
                      Active
                  </button></td>
                @else
                  <button type="button" class="btn btn-danger shadow">
                      Inactive
                  </button></td>
                @endif
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


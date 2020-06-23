@extends('dashboard.index')

@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
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
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Role(s)</th>
            <th>Registered at</th>
          </tr>
        </tfoot>
        <tbody>


          @foreach ($users as $user)
            <tr>
              <td>
              <a href="{{ route('manage.user', [ 'id' => $user->id]) }}">{{ ucfirst($user->name) }}</a>
            </td>

              @foreach ($user->roles as $role)
                <td>{{ ucfirst($role->name)."|" }}</td>
              @endforeach
              <td> {{ $user->created_at }}</td>
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


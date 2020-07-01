@extends('dashboard.index')

@section('title')
  Progress Report
@endsection

@section('menus')
<div class="row mb-5">
<a href="{{route('progress.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
		<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Add New Progress Report</span>
  </a>
</div>

@endsection

@section('content')

         <!-- DataTales Example -->
         <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Of Progress Report</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Accident Ref No.</th>
                      <th>Time</th>
                      <th>Particulars</th>
                      <th>Menues</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Accident Ref No.</th>
                      <th>Time</th>
                      <th>Particulars</th>
                      <th>Menues</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($progress as $item)
                    <tr>
                    <td >{{$item->accident->reference_number}}</td>
                    <td>{{$item->time}}</td>
                    <td>{{$item->particulars}} </td>
                    <td ><div class="row">
                      <a href="{{route('progress.edit', ['progress' => $item->id ])}}" class="btn btn-success btn-circle btn-sm mx-1">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('progress.destroy', ['progress' => $item->id ])}}" method="POST" class="mx-1">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                    </div>
                    </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
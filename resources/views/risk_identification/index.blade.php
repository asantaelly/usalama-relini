@extends('dashboard.index')

@section('title')
  Risk Identifiction
@endsection

@section('menus')
<div class="row mb-5">
<a href="{{route('risk_identification.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
		<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Identify New Risk</span>
  </a>
</div>

@endsection

@section('content')

         <!-- DataTales Example -->
         <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Of Risk Identified</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Risk ID</th>
                        <th>Risk</th>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Menus </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Risk ID</th>
                        <th>Risk</th>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Menus </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($risks as $risk)
                    <tr>
                    <td>{{$risk->risk_id}}</td>
                    <td>{{$risk->risk}}</td>
                    <td>{{strtoupper(str_replace("_"," ",$risk->departiment))}}</td>
                    <td>{{$risk->description}}</td>
                    <td><div class="row">
                      <a href="{{route('risk_identification.edit', ['risk_identification' => $risk->id ])}}" class="btn btn-success btn-circle btn-sm mx-1">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('risk_identification.destroy', ['risk_identification' => $risk->id ])}}" method="POST" class="mx-1">
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

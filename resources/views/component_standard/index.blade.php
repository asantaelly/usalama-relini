@extends('dashboard.index')

@section('title')
  Standard and Comparision
@endsection

@section('menus')
<div class="row mb-5">
<a href="{{route('components.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
		<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Add New Component and Standard</span>
  </a>
</div>

@endsection

@section('content')

         <!-- DataTales Example -->
         <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Of Component and Standard</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Component</th>
                        <th>Standard</th>
                        <th>Menus </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Component</th>
                      <th>Standard</th>
                      <th>Menus </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($components as $component)
                    <tr>
                    <td>{{$component->component}}</td>
                    <td>
                      <ol>
                        @foreach ($component->standards as $standard)
                        <li>{{$standard->standard}}</li> 
                        @endforeach
                      </ol>
                    </td>
                    <td><div class="row">
                      <a href="{{route('components.edit', ['component' => $component->id ])}}" class="btn btn-success btn-circle btn-sm mx-1">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('components.destroy', ['component' => $component->id ])}}" method="POST" class="mx-1">
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
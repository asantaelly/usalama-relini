@extends('dashboard.index')

@section('title')
  Officer Concerned
@endsection

@section('menus')
<div class="row mb-5">
<a href="{{route('officer.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
		<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Add New Officer</span>
  </a>
</div>

@endsection

@section('content')

         <!-- DataTales Example -->
         <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Of Officers Concerned</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Name</th>
                      <th>Mobile Phone No.</th>
                      <th>EXT No</th>
                      <th>Menus</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Name</th>
                      <th>Mobile Phone No.</th>
                      <th>EXT No</th>
                      <th>Menus</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($officers as $officer)
                    <tr>
                    <td>{{$officer->title}}</td>
                      <td>{{$officer->name}}</td>
                      <td>
                        @foreach ($officer->officer_contacts as $contact)
                        {{$contact->phone_no}}
                        @if ($loop->last)
                            &nbsp;
                        @else
                         /
                        @endif
                      @endforeach
                    </td>
                      <td>{{$officer->ext_no}}</td>
                    <td><div class="row">
                      <a href="{{route('officer.edit', ['officer' => $officer->id ])}}" class="btn btn-success btn-circle btn-sm mx-1">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('officer.destroy', ['officer' => $officer->id ])}}" method="POST" class="mx-1">
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

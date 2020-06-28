@extends('dashboard.index')

@section('title')
		Accident Logs
@endsection

@section('menus')
<div class="row">
<a href="{{route('accident.create')}}" class="btn btn-success btn-icon-split btn-sm mr-3">
		<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Add New Accident Log</span>
  </a>
</div><br/><br/>
	<div class="row col-lg-12 mb-5">
  <form action="" method="POST">
    <div class="form-group col-lg-5">
      <label for="death_id">Death type</label> 
      <div>
        <select id="death_id" name="death_id" class="custom-select">
          <option value="" selected disabled>Select Death Type</option>
          @foreach ($death_types as $item)
            <option value="{{$item['value']}}">{{$item['option']}}</option>
          @endforeach
        </select>
      </div>
      
    </div>
  </form>
  </div>

@endsection

@section('content')

         <!-- DataTales Example -->
         <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Of Accident Logs</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Reference No.</th>
                      <th>Subject</th>
                      <th>Location</th>
                      <th>Occured At</th>
                      <th>Section</th>
                      <th>Menues</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Reference No.</th>
                      <th>Subject</th>
                      <th>Location</th>
                      <th>Occured At</th>
                      <th>Section</th>
                      <th>Menues</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($accidents as $accident)
                    <tr>
                    <td>{{$accident->reference_number}}</td>
                      <td>{{$accident->accident_subject}}</td>
                      <td>{{$accident->occured_at}}</td>
                      <td>{{$accident->time_of_accident}}</td>
                      <td>{{$accident->section->code_name}}</td>
                    <td><div class="row">
                      <a href="{{route('accident.edit', ['accident' => $accident->id ])}}" class="btn btn-success btn-circle btn-sm mx-1">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{route('accident.show', ['accident' => $accident->id ])}}" class="btn btn-info btn-circle btn-sm mx-1">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      <form action="{{route('accident.destroy', ['accident' => $accident->id ])}}" method="POST" class="mx-1">
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
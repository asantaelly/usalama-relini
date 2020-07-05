@extends('dashboard.index')

@section('title')
 Create Identified Risk
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Risk Identification Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('risk_identification.store')}}" method="POST">
			@csrf
			<div class="row" >
                <div class="form-group col-lg-6">
					<label for="objective">Corporate Objective On Strategic Plan Latter</label> 
					<div>
						<select id="objective" name="objective" required="required" class="custom-select @error('objective') is-invalid @enderror">
							<option value="" selected disabled>Select Latter</option>
							@foreach ($objectives as $objective)
							<option value="{{$objective}}">{{$objective}}</option>
							@endforeach
						</select>
					</div>
					@error('objective')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
                <div class="form-group col-lg-6">
					<label for="department">Departments</label> 
					<div>
						<select id="department" name="department" required="required" class="custom-select @error('department') is-invalid @enderror">
							<option value="" selected disabled>Select Department</option>
							@foreach ($departments as $department)
							<option value="{{$department['value']}}">{{$department['option']}}</option>
							@endforeach
						</select>
					</div>
					@error('department')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            <div class="form-group col-lg-12">
                <label for="risk">Risk Title</label> 
                <input id="risk" name="risk" placeholder="Risk" type="text" required="required" class="form-control @error('risk') is-invalid @enderror">
                @error('risk')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12">
                <label for="description">Risk Description</label> 
                <textarea id="description" name="description" cols="40" rows="5" placeholder="Risk Description" type="text" required="required" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
				
				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-success">Save Changes</button>
				</div>
			</form>
	</div>
</div>

@endsection
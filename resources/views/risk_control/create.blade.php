@extends('dashboard.index')

@section('title')
 Create Identified Risk
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Risk Control Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('risk_control.store')}}" method="POST">
			@csrf
			<div class="row" >
                <div class="form-group col-lg-12">
					<label for="risk_id">Risk ID</label> 
					<div>
						<select id="risk_id" name="risk_id" required="required" class="custom-select @error('risk_id') is-invalid @enderror">
							<option value="" selected disabled>Select Risk ID</option>
							@foreach ($risks as $risk)
							<option value="{{$risk['value']}}">{{$risk['option']}}</option>
							@endforeach
						</select>
					</div>
					@error('risk_id')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label for="description">Risk Control Description</label> 
                <textarea id="description" name="description" cols="40" rows="5" placeholder="Risk Control Description" type="text" required="required" class="form-control @error('description') is-invalid @enderror"></textarea>
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
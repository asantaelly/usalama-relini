@extends('dashboard.index')

@section('title')
Create Death Type
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Death Type Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('death.store')}}" method="POST">
			@csrf
			<div class="row" >
				<div class="form-group col-lg-8">
					<label for="nature">Nature</label> 
					<input id="nature" name="nature" placeholder="Nature" type="text" required="required" class="form-control @error('nature') is-invalid @enderror">
					@error('nature')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
				
				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-success">Save Changes</button>
				</div>
			</form>
	</div>
</div>


@endsection
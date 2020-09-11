@extends('dashboard.index')

@section('title')
Edit Training Event
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12 px-0">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form to Edit Training Event</h6>
    </div>
  <div class="card-body text-dark">
		<form action="{{ route('training.update', [ 'id' => $event->id])}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            
			<div class="row" >
				<div class="form-group col-lg-6">
					<label for="title" class="font-weight-bolder">Title</label> 
					<input id="title" name="title" placeholder="Title" value="{{ $event->title }}" type="text" required="required" class="form-control @error('title') is-invalid @enderror">
					@error('title')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            
            <div class="row">
				<div class="form-group col-lg-6">
					<label for="description" class="font-weight-bolder">Description</label> 
					<textarea id="description" name="description" placeholder="Description" type="text" class="form-control @error('description') is-invalid @enderror" required="required">{{ $event->description }}</textarea>
					@error('description')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>


			<div class="row">
				<div class="form-group col-lg-6">
					<label for="role" class="font-weight-bolder">Attending Group</label>

					<div class="row ml-1">
                        @foreach($roles as $role)
                            @if ($role->name == $event->role->name)
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio{{ $role->id }}" name="role_id" value="{{ $role->id }}" class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-bolder" for="customRadio{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                                </div> 
                                &nbsp; &nbsp;
                                @continue
                            @endif
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio{{ $role->id }}" name="role_id" value="{{ $role->id }}" class="custom-control-input">
                                <label class="custom-control-label font-weight-bolder" for="customRadio{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                            </div> 
                            &nbsp; &nbsp;
						@endforeach
					</div>

					@error('role')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            
            <div class="row" >
				<div class="form-group col-lg-4">
					<label for="venue" class="font-weight-bolder">Venue</label> 
					<input id="venue" name="venue" placeholder="Venue" value="{{ $event->venue }}" type="text" required="required" class="form-control @error('venue') is-invalid @enderror">
					@error('venue')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
                
                <div class="form-group col-lg-4">
					<label for="training_date" class="font-weight-bolder">Time of the Event</label> 
					<input id="training_date" name="training_date" value="{{ $event->training_date }}" data-date="{{ $time }}" data-date-format="dd MM yyyy - HH:ii p" data-link-field="training_date" placeholder="YYYY-MM-DD HH:MM:SS" type="text" required="required" class="form-control @error('training_date') is-invalid @enderror">
					@error('training_date')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>


			<hr>

				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-success">Save Changes</button>
				</div>
			</form>
	</div>
</div>
<script>

    $(document).ready(function() {
        $('#training_date').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    });

</script>
@endsection
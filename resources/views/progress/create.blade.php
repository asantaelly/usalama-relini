@extends('dashboard.index')

@section('title')
Create Progress Report
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Progress Report Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('progress.store')}}" method="POST">
			@csrf
			<div class="row mb-3">
				<div class="form-group col-lg-4">
					<label for="accident_id">Accident</label> 
					<div>
						<select id="accident_id" name="accident_id" required="required" class="custom-select @error('accident_id') is-invalid @enderror">
							<option value="" selected disabled>Select Accident</option>
							@foreach ($accidents as $accident)
							<option value="{{$accident['value']}}">{{$accident['option']}}</option>
							@endforeach
						</select>
					</div>
					@error('accident_id')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row input_fields_wrap_progress">
				<div class="form-group col-lg-4">
					<label for="time">Time</label> 
					<input id="time" name="time[0][time]" placeholder="YYYY-MM-DD HH:MM:SS" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="time" type="text" required="required" class="form-control @error('time') is-invalid @enderror">
					@error('time')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="particulars">Particulars</label> 
					<textarea id="particulars" name="particulars[0][particulars]" cols="40" rows="5" class="form-control @error('particulars') is-invalid @enderror"></textarea>
					@error('particulars')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="form-group col-lg-2 mt-4 pt-2">
					<button  class="btn btn-primary add_field_button_progress">Add More field</button>
				</div>
			</div>
				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-success">Save Changes</button>
				</div>
			</form>
	</div>
</div>

 <script>
	 $(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap_progress"); //Fields wrapper
	var add_button      = $(".add_field_button_progress"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(`
					<div class="row col-lg-12 ">
						<div class="form-group col-lg-4 added-${x}">
							<label for="time">Time</label> 
							<input id="time" name="time[${x}][time]" placeholder="YYYY-MM-DD HH:MM:SS" type="text" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label for="particulars">Particulars</label> 
							<textarea id="particulars" name="particulars[${x}][particulars]" cols="40" rows="5" class="form-control"></textarea>
						</div>
						<div class="form-group col-lg-3 mt-4 pt-1">
							<a href="#" class="btn btn-danger btn-circle remove_field">
								<i class="fas fa-trash"></i>
							</a>
						</div></div>`); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(`.added-${x}`).parent('div').remove(); x--;
	})

	$('#time').datetimepicker({
        //language:  'fr',
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
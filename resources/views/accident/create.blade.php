@extends('dashboard.index')

@section('title')
    Accident Log Form
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12 px-0">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Accident Log Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('accident.store')}}" method="POST">
			@csrf
			<div class="row" >
				<div class="form-group col-lg-4">
					<label for="time_of_accident">Accident Time</label> 
					<input id="time_of_accident" name="time_of_accident" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="time_of_accident" placeholder="YYYY-MM-DD HH:MM:SS" type="text" required="required" class="form-control @error('time_of_accident') is-invalid @enderror">
					@error('time_of_accident')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-4">
					<label for="occured_at">Place</label> 
					<input id="occured_at" name="occured_at" placeholder="Place" type="text" class="form-control @error('occured_at') is-invalid @enderror" required="required">
					@error('occured_at')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-4">
					<label for="section_id">Section</label> 
					<div>
						<select id="section_id" name="section_id" required="required" class="custom-select @error('section_id') is-invalid @enderror">
							<option value="" selected disabled>Select Section</option>
							@foreach ($sections as $section)
							<option value="{{$section['value']}}">{{$section['option']}}</option>
							@endforeach
						</select>
					</div>
					@error('section_id')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-4">
					<label for="train">Train/Loco(s)</label> 
					<input id="train" name="train" placeholder="Train/Loco(s)" type="text" class="form-control @error('train') is-invalid @enderror" required="required">
					@error('train')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-4">
					<label for="fuel_balance">Fuel balance</label> 
					<input id="fuel_balance" name="fuel_balance" placeholder="Fuel balance" type="text" class="form-control @error('fuel_balance') is-invalid @enderror" required="required">
					@error('fuel_balance')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-4">
					<label for="train_load">TL</label> 
					<input id="train_load" name="train_load" placeholder="TL" type="text" class="form-control @error('train_load') is-invalid @enderror" required="required">
					@error('train_load')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row">

				<div class="form-group col-lg-6">

					<label for="driver_name">Driver(s)</label>
						<select id="driver_name" name="driver_name" required="required" class="custom-select @error('driver_name') is-invalid @enderror">
							<option value="" selected disabled>Select Driver</option>
							@foreach ($driver->users as $driver)
							<option name="driver_name" value="{{ $driver->name }}">{{ $driver->name }}</option>
							@endforeach
						</select>

					@error('driver_name')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					 @enderror
				</div>

				<div class="form-group col-lg-6">
					<label for="guard_name">Guard(s)</label> 

					<select id="guard_name" name="guard_name" required="required" class="custom-select @error('guard_name') is-invalid @enderror">
						<option value="" selected disabled>Select Guard</option>
						@foreach ($guard->users as $guard)
						<option name="guard_name" value="{{ $guard->name }}">{{ $guard->name }}</option>
						@endforeach
					</select>

					@error('guard_name')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
					<label for="received_from_control_location">Received from control location</label> 
					<input id="received_from_control_location" name="received_from_control_location" placeholder="Received from control location" type="text" class="form-control @error('received_from_control_location') is-invalid @enderror" required="required">
					@error('received_from_control_location')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-6">
					<label for="received_from_control_time">Received from control Time</label> 
					<input id="received_from_control_time" name="received_from_control_time" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="received_from_control_time" placeholder="YYYY-MM-DD HH:MM:SS" type="text" class="form-control @error('received_from_control_time') is-invalid @enderror" required="required">
					@error('received_from_control_time')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
					<label for="accident_subject">Subject</label>
					<div>
						<select id="accident_subject" name="accident_subject" required="required" class="custom-select @error('accident_subject') is-invalid @enderror">
							<option value="" selected disabled>Select Subject</option>
							@foreach ($subjects as $subject)
							<option data-has-death="{{$subject['has_death']}}" value="{{$subject['value']}}">{{$subject['option']}} has death(s) ( {{$subject['has_death']}} )</option>
							@endforeach
						</select>
					</div> 
				</div>
				<div class="form-group col-lg-6">
					<label for="critical_level">Critical Level</label>
					<div>
						<select id="critical_level" name="critical_level" required="required" class="custom-select @error('critical_level') is-invalid @enderror">
							<option value="" selected disabled>Select Critical Level</option>
							@foreach ($critical_levels as $critical_level)
							<option  value="{{$critical_level['value']}}">{{$critical_level['option']}}</option>
							@endforeach
						</select>
					</div> 
				</div>
			</div>
				<div class="form-group">
					<label for="brief_particulars">Brief Particulars</label> 
					<textarea id="brief_particulars" name="brief_particulars" cols="40" rows="5" class="form-control @error('brief_particulars') is-invalid @enderror"></textarea>
					@error('brief_particulars')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="damages">Damages</label> 
					<textarea id="damages" name="damages" cols="40" rows="5" class="form-control @error('damages') is-invalid @enderror"></textarea>
					@error('damages')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<label for="cause_of_the_accident">Cause of the accident</label> 
						<input id="cause_of_the_accident" name="cause_of_the_accident" placeholder="Cause of the accident" type="text" class="form-control @error('cause_of_the_accident') is-invalid @enderror" required="required">
						@error('cause_of_the_accident')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group col-lg-6">
						<label for="assistance_required">Assistance required</label> 
						<input id="assistance_required" name="assistance_required" placeholder="Assistance required" type="text" class="form-control @error('assistance_required') is-invalid @enderror">
						@error('assistance_required')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-4">
						<label for="nature_of_accident">Nature of accident</label> 
						<div>
							<select id="nature_of_accident" name="nature_of_accident" class="custom-select @error('nature_of_accident') is-invalid @enderror" required="required">
								<option value="" selected disabled>Select Nature Of Accident</option>
								@foreach ($nature_of_accident as $item)
								<option value="{{$item['value']}}">{{$item['option']}}</option>
								@endforeach
							</select>
						</div>
						@error('nature_of_accident')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group col-lg-4">
						<label for="belonged_quarter">Belonged quarter</label> 
						<div>
							<select id="belonged_quarter" name="belonged_quarter" class="custom-select @error('belonged_quarter') is-invalid @enderror" required="required">
								<option value="" selected disabled>Select Belonged Quarter</option>
								@foreach ($belonged_quarter as $item)
								<option value="{{$item['value']}}">{{$item['option']}}</option>
								@endforeach
							</select>
						</div>
						@error('belonged_quarter')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group col-lg-4">
						<label for="responsible_designation">Responsible designation</label> 
						<div>
							<select id="responsible_designation" name="responsible_designation" class="custom-select @error('responsible_designation') is-invalid @enderror" required="required">
								<option value="" selected disabled>Select Resposible Designation</option>
								@foreach ($resposible_designation as $item)
								<option value="{{$item['value']}}">{{$item['option']}}</option>
								@endforeach
							</select>
						</div>
						@error('responsible_designation')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<label for="time_spent_for_line_clear">Time spent for line clear</label> 
						<input id="time_spent_for_line_clear" name="time_spent_for_line_clear" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="time_spent_for_line_clear" placeholder="YYYY-MM-DD HH:MM:SS" type="text" class="form-control @error('time_spent_for_line_clear') is-invalid @enderror" required="required">
						@error('time_spent_for_line_clear')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group col-lg-6">
						<label for="line_closure_time">Line closure time</label> 
						<input id="line_closure_time" name="line_closure_time" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="line_closure_time" placeholder="YYYY-MM-DD HH:MM:SS" type="text" class="form-control @error('line_closure_time') is-invalid @enderror" required="required">
						@error('line_closure_time')
						<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				<div class="row input_fields_wrap_death ">
					<div class="row col-lg-12">
						<div class="form-group col-lg-5">
							<label for="death_id">Death type</label> 
							<div>
								<select id="death_id" name="death_id[0][id]" class="custom-select @error('death_id') is-invalid @enderror">
									<option value="" selected disabled>Select Death Type</option>
									@foreach ($death_types as $item)
										<option value="{{$item['value']}}">{{$item['option']}}</option>
									@endforeach
								</select>
							</div>
							@error('death_id')
							<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group col-lg-4">
							<label for="death_number">Death number</label> 
							<input id="death_number" name="death_number[0][value]" placeholder="Death number" type="text" class="form-control @error('death_number') is-invalid @enderror">
							@error('death_number')
							<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group col-lg-3 mt-4 pt-2">
							<button  class="btn btn-primary add_field_button_death">Add More field</button>
						</div>
					</div>
				</div>
				<div class="row input_fields_wrap_injury">
					<div class="row col-lg-12">
						<div class="form-group col-lg-5">
							<label for="injury_id">Injury type</label> 
							<div>
								<select id="injury_id" name="injury_id[0][id]" class="custom-select @error('injury_id') is-invalid @enderror">
									<option value="" selected disabled>Select Injury Type</option>
									@foreach ($injury_types as $item)
										<option value="{{$item['value']}}">{{$item['option']}}</option>
									@endforeach
								</select>
							</div>
							@error('injury_id')
							<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group col-lg-4">
							<label for="injury_number">Injury number</label> 
							<input id="injury_number" name="injury_number[0][value]" placeholder="Injury number" type="text" class="form-control @error('injury_number') is-invalid @enderror">
							@error('injury_number')
							<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group col-lg-2 mt-4 pt-2">
							<button class="btn btn-primary add_field_button_injury">Add More field</button>
						</div>
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
	var wrapper   		= $(".input_fields_wrap_death"); //Fields wrapper
	var add_button      = $(".add_field_button_death"); //Add button ID

	$("#accident_subject").change(function(){
		
		if ($("#accident_subject").find(':selected').data('has-death') == 'no') {
		wrapper.hide()
			add_button.hide()
		}else{
			wrapper.show()
			add_button.show()
		}
	})
	
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(`
					<div class="row col-lg-12 ">
						<div class="form-group col-lg-5 added-${x}">
							<label for="death_id">Death type</label> 
							<div>
								<select id="death_id" name="death_id[${x}][id]" class="custom-select">
									<option value="" selected disabled>Select Death Type</option>
								`+
									`@foreach ($death_types as $item)
										<option value="{{$item['value']}}">{{$item['option']}}</option>
									@endforeach` +
								`</select>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="death_number">Death number</label> 
							<input id="death_number" name="death_number[${x}][value]" placeholder="Death number" type="text" class="form-control">
						</div>
						<div class="form-group col-lg-3 mt-4 pt-1">
							<a href="#" class="btn btn-danger btn-circle remove_field">
								<i class="fas fa-trash"></i>
							</a>
						</div></div>`); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); 
		$(`.added-${x}`).parent('div').remove(); x--;
	})

	var max_fields_injury     = 10; //maximum input boxes allowed
	var wrapper_injury    		= $(".input_fields_wrap_injury"); //Fields wrapper
	var add_button_injury     = $(".add_field_button_injury"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button_injury).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields_injury){ //max input box allowed
			x++; //text box increment
			$(wrapper_injury).append(`
					<div class="row col-lg-12">
						<div class="form-group col-lg-5 added-injury-${x}">
							<label for="injury_id">Injury type</label> 
							<div>
								<select id="injury_id" name="injury_id[${x}][id]" class="custom-select">
									<option value="" selected disabled>Select Injury Type</option>
								`+
									`@foreach ($injury_types as $item)
										<option value="{{$item['value']}}">{{$item['option']}}</option>
									@endforeach`+
								`</select>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="injury_number">Injury number</label> 
							<input id="injury_number" name="injury_number[${x}][value]" placeholder="Injury number" type="text" class="form-control">
						</div>
						<div class="form-group col-lg-3 mt-4 pt-1">
							<a href="#" class="btn btn-danger btn-circle remove_field_injury">
								<i class="fas fa-trash"></i>
							</a>
						</div></div>`); //add input box
		}
	});
	
	$(wrapper_injury).on("click",".remove_field_injury", function(e){ //user click on remove text
		e.preventDefault(); $(`.added-injury-${x}`).parent('div').remove(); x--;
	})

	$('#time_of_accident').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
	});
	
	$('#received_from_control_time').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
	});
	
	$('#time_spent_for_line_clear').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
	});
	
	$('#line_closure_time').datetimepicker({
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
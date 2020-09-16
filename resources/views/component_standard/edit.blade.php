@extends('dashboard.index')

@section('title')
 Create Component and Standard
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Component and Standard Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('components.update', ['component' => $component->id])}}" method="POST">
			@csrf
			@method('PATCH')
			<div class="row" >
				<div class="form-group col-lg-8">
					<label for="component">Component</label> 
				<input id="component" name="component" placeholder="Component Name" value="{{$component->component}}" type="text" required="required" class="form-control @error('component') is-invalid @enderror">
					@error('component')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row input_fields_wrap_standard">
				@foreach ($component->standards as $standard)
				<div class="row col-lg-12 ">
				<div class="form-group col-lg-4 added-{{$loop->index+1}}">
					<label for="standard">Standard</label> 
				<input id="standard" name="standard[{{$loop->index+1}}][standard]" placeholder="Standard" value="{{$standard->standard}}" type="text" required="required" class="form-control @error('standard') is-invalid @enderror">
					@error('standard')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				@if($loop->first)
				<div class="form-group col-lg-2 mt-4 pt-2">
					<button  class="btn btn-primary add_field_button_standard">Add More field</button>
				</div>
				@else
				<div class="form-group col-lg-3 mt-4 pt-1">
					<a href="#" class="btn btn-danger btn-circle remove_field">
						<i class="fas fa-trash"></i>
					</a>
				</div>
				@endif

				</div>
				@endforeach
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
   var wrapper   		= $(".input_fields_wrap_standard"); //Fields wrapper
   var add_button      = $(".add_field_button_standard"); //Add button ID
   
   var x = `{{$component->standards->count()}}`; //initlal text box count
   $(add_button).click(function(e){ //on add input button click
	   e.preventDefault();
	   if(x < max_fields){ //max input box allowed
		   x++; //text box increment
		   $(wrapper).append(`
				   <div class="row col-lg-12 ">
					   <div class="form-group col-lg-4 added-${x}">
						   <label for="standard">Standard</label> 
						   <input id="standard" name="standard[${x}][standard]" type="text" required="required" class="form-control">
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
});

</script>
@endsection
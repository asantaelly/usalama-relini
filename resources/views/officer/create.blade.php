@extends('dashboard.index')

@section('title')
Create Officer Concerned
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Fill The Officer Concerned Form</h6>
    </div>
  <div class="card-body">
		<form action="{{route('officer.store')}}" method="POST">
			@csrf
			<div class="row" >
				<div class="form-group col-lg-4">
					<label for="title">Title</label> 
					<input id="title" name="title" placeholder="Title" type="text" required="required" class="form-control @error('title') is-invalid @enderror">
					@error('title')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-4">
					<label for="name">Name</label> 
					<input id="name" name="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" required="required">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-4">
					<label for="ext_no">EXT NO.</label> 
					<input id="ext_no" name="ext_no" placeholder="EXT NO." type="text" class="form-control @error('ext_no') is-invalid @enderror" required="required">
					@error('ext_no')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
				<div class="row input_fields_wrap_contact">
					<div class="row col-lg-12">
						<div class="form-group col-lg-4">
							<label for="contact">Contact</label> 
							<input id="contact" name="contact[0][phone_no]" placeholder="+255768564536" type="text" class="form-control @error('contact') is-invalid @enderror">
							@error('contact')
							<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group col-lg-6 mt-4 pt-2">
							<button  class="btn btn-primary add_field_button_contact">Add More field</button>
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
	var wrapper   		= $(".input_fields_wrap_contact"); //Fields wrapper
	var add_button      = $(".add_field_button_contact"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(`
					<div class="row col-lg-12 ">
						<div class="form-group col-lg-4 added-${x}">
							<label for="contact">Contact</label> 
							<input id="contact" name="contact[${x}][phone_no]" placeholder="+255676555536" type="text" class="form-control">
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
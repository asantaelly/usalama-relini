@extends('dashboard.index')

@section('title')
Add Critical Worker
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12 px-0">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form to Add Critical Worker</h6>
    </div>
  <div class="card-body text-dark">
		<form action="{{ route('store.user')}}" method="POST" autocomplete="off">
			@csrf
			<div class="row" >

				{{-- First_Name or Name --}}
				<div class="form-group col-lg-4">
					<label for="name">First Name</label> 
					<input id="name" name="name" placeholder="First Name" type="text" required="required" class="form-control @error('name') is-invalid @enderror">
					@error('name')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				{{-- Last Name --}}
				<div class="form-group col-lg-4">
					<label for="last_name">Last Name</label> 
					<input id="last_name" name="last_name" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" required="required">
					@error('last_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				{{-- Email --}}
				<div class="form-group col-lg-4">
					<label for="email">Email</label>
					<input id="email" name="email" placeholder="Eg. example@mail.com" type="text" class="form-control @error('email') is-invalid @enderror" autocomplete="off">
					
					@error('email')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="row">

				{{-- Password --}}
				<div class="form-group col-lg-4">
					<label for="password">Password</label> 
					<input id="password" name="password" placeholder="Eg. Y7ut@hg0O9hj12q" type="password" class="form-control @error('password') is-invalid @enderror">
					@error('password')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				{{-- Confirm Password --}}
				<div class="form-group col-lg-4">
					<label for="password_confirmation">Confirm Password</label> 
					<input id="password_confirmation" name="password_confirmation" placeholder="Eg. Y7ut@hg0O9hj12q" type="password" class="form-control" required="required">
					@error('medical')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

			</div>


			<div class="row">

				{{-- Phone Number --}}
				<div class="form-group col-lg-4">
					<label for="phone_number">Phone Number</label> 
					<input id="phone_number" name="phone_number" placeholder="Eg. +255768564536" type="text" class="form-control @error('phone_number') is-invalid @enderror" required="required">
					@error('phone_number')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				
				{{-- Address --}}
				<div class="form-group col-lg-4">
					<label for="address">Address</label> 
					<input id="address" name="address" placeholder="Eg. Temeke, Dar es Salaam" type="text" class="form-control @error('address') is-invalid @enderror" required="required">
					@error('address')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>


				{{-- Role --}}
				<div class="form-group col-lg-4">
					<label for="role">Role</label>
					<select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
						<option value="" selected disabled>Choose Role</option>
						@foreach($roles as $role)
							<option value="{{ $role->id}}">{{ ucfirst($role->name)}}</option>
						@endforeach
					</select>
					
					@error('role')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="form-group col-lg-4">
					<label for="competence">Competence</label> 
					<textarea id="competence" name="competence" placeholder="Eg. Sufficient skills to Drive a Train" type="text" class="form-control @error('competence') is-invalid @enderror" required="required"></textarea>
					@error('competence')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>


				<div class="form-group col-lg-4">
					<label for="medical">Medical Fitness</label> 
					<textarea id="medical" name="medical" placeholder="Eg. Good Healthy and Mental Condition" type="text" class="form-control @error('medical') is-invalid @enderror" required="required"></textarea>
					@error('medical')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

			</div>

				<div class="row input_fields_wrap_contact">

					<div class="row col-lg-12">
						<div class="form-group col-lg-4">
							<label for="education">Education & Certification</label> 
							<input id="education" name="education[0][level]" placeholder="Eg. Bachelor Degree in Computer & Business" type="text" class="form-control @error('education') is-invalid @enderror" required>
							@error('education')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group col-lg-2 mt-4 pt-2">
							<button  class="btn btn-primary add_field_button_contact">Add More field</button>
						</div>
					</div>
				</div>

				<div class="row input_fields_wrap_qualify">

					<div class="row col-lg-12">
						<div class="form-group col-lg-4">
							<label for="qalify">Qualifications</label> 
							<input id="qualify" name="qualify[0][need]" placeholder="Eg. More than 5 years of Experience" type="text" class="form-control @error('qualify') is-invalid @enderror" required>
							@error('qualify')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group col-lg-2 mt-4 pt-2">
							<button  class="btn btn-primary add_field_button_qualify">Add More field</button>
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





		// 
		// Education Field
		// 
		// 
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
								<input id="education" name="education[${x}][level]" placeholder="Eg. Certified Ethical Hacker" type="text" class="form-control">
							</div>
							<div class="form-group col-lg-3 mt-0 pt-0">
								<a href="#" class="btn btn-danger btn-circle remove_field">
									<i class="fas fa-trash"></i>
								</a>
							</div></div>`); //add input box
			}
		});
		
		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(`.added-${x}`).parent('div').remove(); x--;
		})



		// 
		// QUALITY 
		// 
		var qualify_wrapper  = $(".input_fields_wrap_qualify"); //Fields wrapper
		var add_qualify      = $(".add_field_button_qualify"); //Add button ID
		
		var y = 1; //initlal text box count
		$(add_qualify).click(function(e){ //on add input button click

			e.preventDefault();
			if(y < max_fields){ //max input box allowed
				y++; //text box increment
				$(qualify_wrapper).append(`
						<div class="row col-lg-12 ">
							<div class="form-group col-lg-4 addedy-${y}">
								<input id="qualify" name="qualify[${y}][need]" placeholder="Eg. More than 5 years of Experience" type="text" class="form-control">
							</div>
							<div class="form-group col-lg-3 mt-0 pt-0">
								<a href="#" class="btn btn-danger btn-circle remove_field_qualify">
									<i class="fas fa-trash"></i>
								</a>
							</div></div>`); //add input box
			}
		});
		
		$(qualify_wrapper).on("click",".remove_field_qualify", function(e){ //user click on remove text
			e.preventDefault(); $(`.addedy-${y}`).parent('div').remove(); y--;
		})







	});
 </script>
@endsection
@extends('dashboard.index')

@section('title')
        Edit Worker
@endsection

@section('content')
<div class="card shadow mb-4 col-lg-12 px-0">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form to Edit Worker</h6>
    </div>
  <div class="card-body text-dark">
		<form action="{{ route('store.user')}}" method="POST" autocomplete="off">
			@csrf
			<div class="row" >

				{{-- First_Name or Name --}}
				<div class="form-group col-lg-4">
					<label for="name" class="font-weight-bolder">First Name</label> 
					<input id="name" name="name" value="{{ $user->name }}" placeholder="First Name" type="text" required="required" class="form-control @error('name') is-invalid @enderror">
					@error('name')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

                {{-- Last Name --}}
                {{-- If user has profile --}}
                @if($user->profile != null )
                    <div class="form-group col-lg-4">
                        <label for="last_name" class="font-weight-bolder">Last Name</label> 
                        <input id="last_name" name="last_name" value="{{ $user->profile->last_name }}" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" required="required">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @else
                {{-- If user has No profile --}}
                    <div class="form-group col-lg-4">
                        <label for="last_name" class="font-weight-bolder">Last Name</label> 
                        <input id="last_name" name="last_name" value="" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" required="required">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif


				{{-- Email --}}
				<div class="form-group col-lg-4">
					<label for="email" class="font-weight-bolder">Email</label>
					<input id="email" name="email" value="{{ $user->email }}" placeholder="Eg. example@mail.com" type="text" class="form-control @error('email') is-invalid @enderror" autocomplete="off">
					
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
					<label for="password" class="font-weight-bolder">Password</label>
					<input id="password" name="password" placeholder="Eg. Y7ut@hg0O9hj12q" type="password" class="form-control @error('password') is-invalid @enderror">
					@error('password')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				{{-- Confirm Password --}}
				<div class="form-group col-lg-4">
					<label for="password_confirmation" class="font-weight-bolder">Confirm Password</label> 
					<input id="password_confirmation" name="password_confirmation" placeholder="Eg. Y7ut@hg0O9hj12q" type="password" class="form-control" required="required">
					@error('medical')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="form-group col-lg-4">
					<label for="statusRadio" class="font-weight-bolder">User Status</label>
					<div class="row ml-1">


                        @if($user->status == TRUE)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="status" value="1" class="custom-control-input" checked>
                                <label class="custom-control-label font-weight-bolder" for="customRadio1">Active</label>
                            </div> 
                            &nbsp;
                            &nbsp;
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="status" value="0" class="custom-control-input">
                                <label class="custom-control-label font-weight-bolder" for="customRadio2">Inactive</label>
                            </div>
                        @else
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="status" value="1" class="custom-control-input">
                                <label class="custom-control-label font-weight-bolder" for="customRadio1">Active</label>
                            </div> 
                            &nbsp;
                            &nbsp;
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="status" value="0" class="custom-control-input" checked>
                                <label class="custom-control-label font-weight-bolder" for="customRadio2">Inactive</label>
                            </div>
                        @endif
					</div>
				</div>

				

			</div>


			<div class="row">

                
                @if($user->profile != null)
                    {{-- Phone Number --}}
                    <div class="form-group col-lg-4">
                        <label for="phone_number" class="font-weight-bolder">Phone Number</label> 
                        <input id="phone_number" name="phone_number" value="{{ $user->profile->phone_number }}" placeholder="Eg. +255768564536" type="text" class="form-control @error('phone_number') is-invalid @enderror" required="required">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    {{-- Address --}}
                    <div class="form-group col-lg-4">
                        <label for="address" class="font-weight-bolder">Address</label> 
                        <input id="address" name="address" value="{{ $user->profile->address }}" placeholder="Eg. Temeke, Dar es Salaam" type="text" class="form-control @error('address') is-invalid @enderror" required="required">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @else 
                    <div class="form-group col-lg-4">
                        <label for="phone_number" class="font-weight-bolder">Phone Number</label> 
                        <input id="phone_number" name="phone_number" placeholder="Eg. +255768564536" type="text" class="form-control @error('phone_number') is-invalid @enderror" required="required">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    {{-- Address --}}
                    <div class="form-group col-lg-4">
                        <label for="address" class="font-weight-bolder">Address</label> 
                        <input id="address" name="address" placeholder="Eg. Temeke, Dar es Salaam" type="text" class="form-control @error('address') is-invalid @enderror" required="required">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
			</div>


            <div class="row" >
				{{-- Role --}}
				<div class="form-group col-lg-4">
                    <label for="statusRadio" class="font-weight-bolder">User Role(s)</label>
					<div class="row">
                        @foreach($user->roles as $role)
                            @if ($role->name == 'normal')
                                @continue
                            @endif
                            <div class="form-check form-check-inline ml-3">
                                <input type="checkbox" id="" name="role" value="{{ $role->id }}" class="form-check-input" checked>
                                <label class="form-check-label font-weight-bolder" for="">{{ ucfirst($role->name) }}</label>
                            </div> 
                            &nbsp;
                        @endforeach
                        @foreach($user->userRole() as $role)
                            <div class="form-check form-check-inline ml-3">
                                <input type="checkbox" id="" name="role" value="{{ $role->id }}" class="form-check-input">
                                <label class="form-check-label font-weight-bolder" for="">{{ ucfirst($role->name) }}</label>
                            </div>
                            &nbsp;
                        @endforeach
                    </div>
                    
					@error('role')
					    <span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>



			<hr>

            
			<div class="row">
                @if($user->profile != null)
				<div class="form-group col-lg-4">
					<label for="competence" class="font-weight-bolder">Competence</label> 
					<textarea id="competence" name="competence" placeholder="Eg. Sufficient skills to Drive a Train" type="text" class="form-control @error('competence') is-invalid @enderror" required="required">{{ $user->profile->competence }}</textarea>
					@error('competence')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>


				<div class="form-group col-lg-4">
					<label for="medical" class="font-weight-bolder">Medical Fitness</label>
                    <textarea id="medical" name="medical" placeholder="Eg. Good Healthy and Mental Condition" type="text" class="form-control @error('medical') is-invalid @enderror" required="required">{{ $user->profile->medical }}</textarea>
					@error('medical')
					<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
                @else
                    <div class="form-group col-lg-4">
                        <label for="competence" class="font-weight-bolder">Competence</label> 
                        <textarea id="competence" name="competence" placeholder="Eg. Sufficient skills to Drive a Train" type="text" class="form-control @error('competence') is-invalid @enderror" required="required"></textarea>
                        @error('competence')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group col-lg-4">
                        <label for="medical" class="font-weight-bolder">Medical Fitness</label>
                        <textarea id="medical" name="medical" placeholder="Eg. Good Healthy and Mental Condition" type="text" class="form-control @error('medical') is-invalid @enderror" required="required"></textarea>
                        @error('medical')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif

			</div>

				<div class="row input_fields_wrap_contact">

					<div class="row col-lg-12">
                        @if ($user->profile == null)
                            <div class="form-group col-lg-4">
                                <label for="education" class="font-weight-bolder">Education & Certification</label>
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
                        @else

                                <label for="education" class="font-weight-bolder ml-2">Education & Certification</label>

                                @foreach ($user->profile->educations as $index => $education)
                                <div class="row col-lg-12">
                                <div class="form-group col-lg-4 added-{{$index}}">
                                        <input id="education" name="education[{{ $index}}][level]" value="{{ $education->level }}" placeholder="Eg. Bachelor Degree in Computer & Business" type="text" class="form-control @error('education') is-invalid @enderror" required>
                                    </div>
                                    @if ($index == 0)
                                        <div class="form-group col-lg-2 mt-0 pt-0">
                                            <button  class="btn btn-primary add_field_button_contact">Add More field</button>
                                        </div>
                                    @else
                                        <div class="form-group col-lg-3 mt-0 pt-0">
                                            <a href="#" class="btn btn-danger btn-circle remove_field">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    @endif
                                    
                                </div>
                                @endforeach
                                
                        @endif
					</div>
				</div>

				<div class="row input_fields_wrap_qualify">

                    @if($user->profile == null)
                        <div class="row col-lg-12">
                            <div class="form-group col-lg-4">
                                <label for="qualify" class="font-weight-bolder">Qualifications</label>
                                <input id="qualify" name="qualify[0][need]" placeholder="Eg. More than 5 years of Experience" type="text" class="form-control @error('qualify') is-invalid @enderror" required>
                            </div>
                            <div class="form-group col-lg-2 mt-4 pt-2">
                                <button  class="btn btn-primary add_field_button_qualify">Add More field</button>
                            </div>
                        </div>
                    @else
                        <label for="qualify" class="font-weight-bolder ml-2">Qualifications</label>

                        @foreach ($user->profile->qualifications as $index => $quality)
                        <div class="row col-lg-12">
                            <div class="form-group col-lg-4">
                                <input id="quality" name="qualify[{{ $index+1}}][need]" value="{{ $quality->quality }}" placeholder="Eg. More than 5 years of Experience" type="text" class="form-control" required>
                            </div>
                            @if ($index == 0)
                                <div class="form-group col-lg-2 mt-0 pt-0">
                                    <button  class="btn btn-primary add_field_button_qualify">Add More field</button>
                                </div>
                            @else
                                <div class="form-group col-lg-3 mt-0 pt-0">
                                    <a href="#" class="btn btn-danger btn-circle remove_field_qualify">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            @endif
                            
                        </div>
                        @endforeach
                    @endif
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
		var max_fields      = 15; //maximum input boxes allowed
		var wrapper   		= $(".input_fields_wrap_contact"); //Fields wrapper
		var add_button      = $(".add_field_button_contact"); //Add button ID
		
		var x = 0; //initlal text box count
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

        // var z = 1;
        // $(wrapper).on("click",".eliminate_field", function(e){ //user click on remove text
		// 	e.preventDefault(); $(`.added-${z}`).parent('div').remove(); --;
		// })



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
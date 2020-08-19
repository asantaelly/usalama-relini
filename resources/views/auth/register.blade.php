<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> ORSMS | Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-10 col-md-9">

        <div class="card o-hidden border-0 rounded-0 shadow-lg my-5">
          <div class="card-body p-0">




            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-3 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="py-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>


                  <form class="user" method="POST" action="{{ route('register')}}" autocomplete="off">
                    @csrf

                    <div class="form-group">

                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="InputName" aria-describedby="name" placeholder="Enter Your Name...">
  
                        @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
  
                    </div>

                    <div class="form-group">

                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">

                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror

                    </div>


                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" {{ old('remember') ? 'checked' : '' }} autocomplete="off">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('') is-invalid @enderror" name="password_confirmation" id="InputName" aria-describedby="name" placeholder="Confirm Password">
                  </div>

                    <button type="submit" class="btn btn-info btn-user btn-block">
                      {{ __('Register') }}
                    </button>
              

                  </form>

                  <br>
                    <div class="text-center">
                      <span class="" style="color: black;">already have an account?</span>
                      <a href="{{ route('login')}}" class="">Signin.</a>
                    </div>
                </div>
              </div>

              <div class="col-lg-3 d-none d-lg-block"></div>

            </div>





          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>

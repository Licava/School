<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- Toaster Notification -->
<link rel="stylesheet" href="{{('toaster/toastr.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  
  </div>
  <!-- /.login-logo -->
  <div class="card" >
    <div class="card-body login-card-body">
      <p class="login-box-msg">Scholarship Management System</p>

      <form method="POST" action="{{ route('login') }}">
                        @csrf
                
        <div class="input-group mb-3">
        
          <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          

          @error('email')
                                    <span class="invalid-feedback" role="alert">
</strong>Invalid credentials</strong></span>

                                @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $messege }}</strong>
                                    </span>
                                @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-success">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
       <center> <a href="{{ route('password.request') }}">I forgot my password</a> </center>
      </p>
      <p class="mb-0">
       <center> <a href="{{ route('register') }}" class="text-center">Register a new membership</a></center>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- Start Toaster & Sweetalert -->
<script src="{{('toaster/toastr.min.js')}}"></script>
<script src="{{('toaster/sweetalert.min.js') }}"></script>


<script>
            @if(Session::has('messege'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                  case 'info':
                       toastr.info("{{ Session::get('messege') }}");
                       break;
                  case 'success':
                      toastr.success("{{ Session::get('messege') }}");
                      break;
                  case 'warning':
                     toastr.warning("{{ Session::get('messege') }}");
                      break;
                  case 'error':
                      toastr.error("{{ Session::get('messege') }}");
                      break;
              }
            @endif
         </script>  


<script>  
             $(document).on("click", "#delete", function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");
                    swal({
                      title: "Are you Want to delete?",
                      text: "Once Delete, This will be Permanently Delete!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                           window.location.href = link;
                      } else {
                        swal("The Data has been saved !");
                      }
                    });
                });
        </script>

<!-- End Toaster & Sweetalert -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js"></script>
</body>
</html>


@extends('backend.layouts.app')

@section('content')
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Scholarship</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(auth()->user()->profile_image))? url(  'upload/profile_image/'.auth()->user()->profile_image):url('upload/no_image.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{URL::to('/Dashboard')}}" class="d-block">{{auth()-> user() ->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{URL::to('/Dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          
          </li>
           @if(auth()-> user() ->role=='Admin')
          
          <li class="nav-item">
            <a href= "{{URL::to('/User')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href= "{{URL::to('/AddUser-index')}}"class="nav-link  ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
               Add Users
              </p>
            </a>
          </li>
           @endif
           <li class="nav-item">
            <a href="{{URL::to('/Profile')}}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/Changepassword')}}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
              <p>
                Change password
              </p>
            </a>
          </li>
          <li class="nav-header">Services</li>
          <li class="nav-item">
          <a href="{{URL::to('/Scholarship')}}" class="nav-link active">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Scholarship
              </p>  
            </a>
            </li>
          <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6 ">
        <h3>Scholarship</h3>
            
       
          </div>
          <div class="col-sm-6">
          <h1></h1>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
             
            </ol>
            <div>
              <p>&nbsp</p>
            </div>
          </div>
          <div class="col-sm-12 d-flex justify-content-between">
          <a></a>
            
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <div></div>
    <!-- Main content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Scholarship</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/p" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Scholarship Name</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}} " name="title" id="title" 
                      value="{{ old('title') }}"  autocomplete="title" autofocus>
                      @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title')}}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Scholarship Info</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}} " name="description" id="description" 
                      value="{{ old('description') }}"  autocomplete="description" autofocus>
                      @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description')}}</strong>
                                    </span>
                                @endif
                  </div>
               
                  <div class="form-group">

             
                        <label for="inputImage">Image</label>
                          
                        <div class="custom-file">
                        
                  <input name="image" type="file" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                        @if ($errors->has('image'))
                                    
                                        <strong>{{ $errors->first('image')}}</strong>
                                  
                                @endif
 
                        </div>
                        <p></p>
                        <div class="form-group">
                    <label for="exampleInputEmail1">Limit of Applicants</label>
                    <input type="number" class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}} " name="limit_applicants" id="limit_applicants" 
                      value="{{ old('limit_applicants') }}"  autocomplete="limit_applicants" autofocus>
                      @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('limit_applicants')}}</strong>
                                    </span>
                                @endif
                  </div>
                        <p></p>



                        <div class="form-group">
                        <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Set a Criteria</label>
                        <p>You can set one or more criteria to find the right applicants </p>
                        </div>
                        <div class="form-group">
                     
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="customSwitch1" for="customSwitch1"  checked="checked" >
<label class="custom-control-label" for="customSwitch1">Location</label>
</div>
</div>
<div class="form-group">

<input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ..." disabled="disabled" name="address">
</div>

<div class="form-group">
                       
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="customSwitch2" for="customSwitch2" checked="checked" >
<label class="custom-control-label" for="customSwitch2">GWA</label>
</div>
</div>
<div class="form-group">

<input type="text" class="form-control is-warning" id="inputWarning2" placeholder="Enter ..." disabled="disabled" name="grade">
</div>

<div class="form-group">
                       
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="customSwitch3" for="customSwitch3" checked="checked" >
<label class="custom-control-label" for="customSwitch3">Parent Income Monthly</label>
</div>
</div>
<div class="form-group">

<input type="number" class="form-control is-warning" id="inputWarning3" placeholder="Enter ..." disabled="disabled" name="Parent_Income">
</div>
                          <!-- /.card-body
                        <div class="form-group">
                        <label for="exampleInputEmail1" >Role</label>
                       
                        <select  class="form-control" id="exampleFormControlSelect1" name="role"  required>
                        <option value="Admin" >Admin</option>
                        <option value="Student" >Student</option>
                        
                        </select>
                       
                      </div>   -->
                <!-- /.card-body -->
                <div class="form-group">
              
              </div>
              <div class="form-group">
              <img id="showImage" class=" background-user-img  rounded mx-auto d-block">
              
              </div>
            </form>
          </div>
                <div class="form-group">
              
                </div>
                <div class="form-group">
                <div class="col-sm-12 d-flex justify-content-between">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/Scholarship" class="btn btn-info" >Cancel</a>
                </div>
                </div>
            
            </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
			( function() { // javascript document ready function
				var firstJavaScriptInput = document.getElementById( 'inputWarning' );
				var firstJavaScriptCheckbox = document.getElementById( 'customSwitch1' );
			
				
				firstJavaScriptCheckbox.addEventListener( 'click', function() { // do things when the checkbox gets clicked
					if ( this.checked ) { // check box is checked so disable input and select
					
						firstJavaScriptInput.disabled = 'disabled';
					} else { // checkbox is not checked, make input and select editable
					
						firstJavaScriptInput.disabled = '';
					}
 				} );
			} )();
		</script>
    <script type="text/javascript">
			( function() { // javascript document ready function
				var firstJavaScriptInput = document.getElementById( 'inputWarning2' );
				var firstJavaScriptCheckbox = document.getElementById( 'customSwitch2' );
			
				
				firstJavaScriptCheckbox.addEventListener( 'click', function() { // do things when the checkbox gets clicked
					if ( this.checked ) { // check box is checked so disable input and select
					
						firstJavaScriptInput.disabled = 'disabled';
					} else { // checkbox is not checked, make input and select editable
					
						firstJavaScriptInput.disabled = '';
					}
 				} );
			} )();
		</script>
        <script type="text/javascript">
			( function() { // javascript document ready function
				var firstJavaScriptInput = document.getElementById( 'inputWarning3' );
				var firstJavaScriptCheckbox = document.getElementById( 'customSwitch3' );
			
				
				firstJavaScriptCheckbox.addEventListener( 'click', function() { // do things when the checkbox gets clicked
					if ( this.checked ) { // check box is checked so disable input and select
					
						firstJavaScriptInput.disabled = 'disabled';
					} else { // checkbox is not checked, make input and select editable
					
						firstJavaScriptInput.disabled = '';
					}
 				} );
			} )();
		</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);  
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
    </script>
    <script>  
   
   function submitForm(form) {
        swal({
            title: "Are you Want to Update your Profile?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                form.submit();
            }
        });
        return false;
    }


        </script>
  <!-- /.content-wrapper -->

  @endsection
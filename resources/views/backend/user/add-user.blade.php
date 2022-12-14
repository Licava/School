@extends('backend.layouts.app')
@section('content')
<aside class="main-sidebar sidebar-dark-warning elevation-4">
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
            <a href= "{{URL::to('/AddUser-index')}}"class="nav-link active ">
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
          <a href="{{URL::to('/Scholarship')}}" class="nav-link">
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

  <!-- /Hello this is the end of our life -->
<div class="content-wrapper">

<section class="content">
    <div class="row">
        <div class="col-lg-1">

        </div>
        <div class="col-lg-10">
            <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Add User mga tangas s
                </h5>
            </div>
            <div class="card-body">
              <form role="form" action="{{URL::to('Insert-user')}}" method="post" onsubmit="return submitForm(this);">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> User name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> User Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your Email" required>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message  }}</strong>
                                    </span>
                                @enderror
                    </div>
                 
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> User Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> User Role</label>
                    <div class="col-sm-10">
                        <select  class="form-control" id="exampleFormControlSelect1" name="role"  >
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
</select>
                    </div>
                </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info" >Submit</button>
                </div>
                <script>  
   
   function submitForm(form) {
        swal({
            title: "Are you sure?",
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
              </form>  
            </div>
        </div>
        </div>
        </div>
</section>
</div>


@endsection
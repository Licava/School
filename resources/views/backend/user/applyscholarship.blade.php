<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <a href="{{URL::to('/home')}}" class="d-block">{{auth()-> user() ->name}}</a>
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
            <a href="{{URL::to('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          
          </li>
           @if(auth()-> user() ->role=='Admin')
          
          <li class="nav-item">
            <a href= "{{URL::to('/User')}}" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href= "{{URL::to('/AddUser-index')}}" class="nav-link">
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
          <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.control-sidebar -->

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Personal Information</h3>
            </div>
            <form action="{{ URL::to('/applying/'.$data->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control{{ $errors->has('First_Name') ? ' is-invalid' : ''}} " name="First_Name" id="First_Name" 
                      value="{{ old('First_Name') }}"  autocomplete="First_Name" autofocus>
                      @if ($errors->has('First_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('First_Name')}}</strong>
                                    </span>
                                @endif
              </div>
         
          <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" class="form-control{{ $errors->has('Last_Name') ? ' is-invalid' : ''}} " name="Last_Name" id="Last_Name" 
                      value="{{ old('Last_Name') }}"  autocomplete="Last_Name" autofocus>
                      @if ($errors->has('Last_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Last_Name')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Phone Number</label>
                <input type="number" class="form-control{{ $errors->has('Phone_number') ? ' is-invalid' : ''}} " name="Phone_number" id="Phone_number" 
                      value="{{ old('Phone_number') }}"  autocomplete="Phone_number" autofocus>
                      @if ($errors->has('Phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Phone_number')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Address</label>
                <input type="text" class="form-control{{ $errors->has('Address') ? ' is-invalid' : ''}} " name="Address" id="Address" 
                      value="{{ old('Address') }}"  autocomplete="Address" autofocus>
                      @if ($errors->has('Address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Address')}}</strong>
                                    </span>
                                @endif
              </div>
             
              <div class="form-group">
                <label for="inputName">Age</label>
                <input type="text" class="form-control{{ $errors->has('Last_Name') ? ' is-invalid' : ''}} " name="Last_Name" id="Last_Name" 
                      value="{{ old('Last_Name') }}"  autocomplete="Last_Name" autofocus>
                      @if ($errors->has('Last_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Last_Name')}}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">School Information</h3>

            
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">School Name</label>
                <input type="text" class="form-control{{ $errors->has('School_Name') ? ' is-invalid' : ''}} " name="School_Name" id="School_Name" 
                      value="{{ old('School_Name') }}"  autocomplete="School_Name" autofocus>
                      @if ($errors->has('School_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('School_Name')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedBudget">Grade/Course</label>
                <input type="text" class="form-control{{ $errors->has('grade') ? ' is-invalid' : ''}} " name="grade" id="grade" 
                      value="{{ old('grade') }}"  autocomplete="grade" autofocus>
                      @if ($errors->has('grade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedBudget">GWA or General Weighted Average</label>
                <input type="number" class="form-control{{ $errors->has('Parent_Income') ? ' is-invalid' : ''}} " name="Parent_Income" id="Parent_Income" 
                      value="{{ old('Parent_Income') }}"  autocomplete="Parent_Income" autofocus>
                      @if ($errors->has('Parent_Income'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Parent_Income')}}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
   
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Parent/Guardian Information</h3>

            
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Parent Guardian Name</label>
                <input type="text" class="form-control{{ $errors->has('School_Name') ? ' is-invalid' : ''}} " name="School_Name" id="School_Name" 
                      value="{{ old('School_Name') }}"  autocomplete="School_Name" autofocus>
                      @if ($errors->has('School_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('School_Name')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedBudget">Relationship</label>
                <input type="text" class="form-control{{ $errors->has('grade') ? ' is-invalid' : ''}} " name="grade" id="grade" 
                      value="{{ old('grade') }}"  autocomplete="grade" autofocus>
                      @if ($errors->has('grade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade')}}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedBudget">Parent Income Monthly</label>
                <input type="number" class="form-control{{ $errors->has('Parent_Income') ? ' is-invalid' : ''}} " name="Parent_Income" id="Parent_Income" 
                      value="{{ old('Parent_Income') }}"  autocomplete="Parent_Income" autofocus>
                      @if ($errors->has('Parent_Income'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Parent_Income')}}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
   
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Files</h3>

            
            </div>
            <div class="card-body">
              
              <div class="card-body p-0">
<table class="table">
<thead>
<tr>
<th>File Name</th>
<th>File Size</th>
<th></th>
</tr>
 </thead>
<tbody>
<tr>
<td>Functional-requirements.docx</td>
<td>49.8005 kb</td>
<td class="text-right py-0 align-middle">
<div class="btn-group btn-group-sm">
<a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
</td>
</tr><tr>
<td>UAT.pdf</td>
<td>28.4883 kb</td>
<td class="text-right py-0 align-middle">
<div class="btn-group btn-group-sm">
<a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
</td>
</tr><tr>
<td>Email-from-flatbal.mln</td>
<td>57.9003 kb</td>
<td class="text-right py-0 align-middle">
<div class="btn-group btn-group-sm">
<a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
</td>
</tr><tr>
<td>Logo.png</td>
<td>50.5190 kb</td>
<td class="text-right py-0 align-middle">
<div class="btn-group btn-group-sm">
<a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
</td>
</tr><tr>
<td>Contract-10_12_2014.docx</td>
<td>44.9715 kb</td>
<td class="text-right py-0 align-middle">
<div class="btn-group btn-group-sm">
<a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
</td>
</tr></tbody>
</table>
</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
   
          <!-- /.card -->
        </div>
      </div>
    
      <div class="row">
        <div class="col-12">

          <button type="submit" class="btn btn-success float-right">Submit</button>
      
       
     
    
          <a href="/Scholarship" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
 

  <!-- jQuery -->
  <script>

</script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
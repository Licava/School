<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../toaster/toastr.min.css">
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
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
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
          <img src="{{(!empty(auth()->user()->profile_image))? url('upload/profile_image/'.auth()->user()->profile_image):url('upload/no_image.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
            <a href= "{{URL::to('/User')}}" class="nav-link">
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
          <a href="{{URL::to('/Scholarship')}}" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scholarship </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Scholarship Applicants</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>School Name</th>
                    <th>Address</th>
                    <th>Grade </th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($ikawna as  $key=> $Applicants)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>    {{ $Applicants->name}}  </td>
                    <td>{{ $Applicants->Name_School}}  </td>
                    <td> {{ $Applicants->Address}}</td>
                    <td>{{$Applicants->Grade}}</td>
                    <td>

                    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <div class="text-center">
                  <img id="showImage" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($Applicants->user->profile_image))? url(  'upload/profile_image/'.$Applicants->user->profile_image):url('upload/no_image.jpg')}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $Applicants->user->name }}</h3>

                <p class="text-muted text-center">{{$Applicants->user->email}}</p>

  

        
              </div>
              <!-- /.card-body -->
            </div>



                    </td>
                    <td>
                    <div>
                    <a href=""class ="btn btn-sm btn-success">
                      <i class="fas fa-comments"></i>&nbsp; Appove
</a>
</div>
<h1></h1>
<div>
                    <a href=""class ="btn btn-sm btn-info">
                      <i class="fas fa-inbox"></i>&nbsp; Details
</a>
</div>
                        
                    </td>
                  </tr>
                  @endforeach
                 
                </table>
              </div>
              <div class="card-header">
                <h3 class="card-title"><B>Scholarship Applicants Who Do Not Meet Certain Criteria</B></h3>
              </div>
              <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Profile Picture </th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($wase as $Applicant)
                  <tr>
                  <td> {{ $Applicant->id}}</td>
                    <td>{{ $Applicant->School_Name}}  </td>
                    <td> {{ $Applicant->Address}}</td>
                    <td>{{$Applicant->Phone_number}}</td>
                    <td>

                    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <div class="text-center">
                  <img id="showImage" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($Applicant->user->profile_image))? url(  'upload/profile_image/'.$Applicant->user->profile_image):url('upload/no_image.jpg')}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $Applicant->user->name }}</h3>

                <p class="text-muted text-center">{{$Applicant->user->email}}</p>

  

        
              </div>
              <!-- /.card-body -->
            </div>



                    </td>
                    <td>
                    <div>
                    <a href="{{URL::to ('/Approve/'.$Applicant->id) }}"class ="btn btn-sm btn-success">
                      <i class="fas fa-comments"></i>&nbsp; Appove
</a>
</div>
<h1></h1>
<div>
                    <a href=""class ="btn btn-sm btn-info">
                      <i class="fas fa-inbox"></i>&nbsp; Details
</a>
</div>
                        
                    </td>
                  </tr>
                  @endforeach
                 
                </table>
              </div>
              <div class="card-header">
                <h3 class="card-title"><B>Scholarship Applicants Approve Their Scholarship Application</B></h3>
              </div>
              
              <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Profile Picture </th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($wasted as  $Applicantes)
                  <tr>
                  <td></td>
                    <td>    {{ $Applicantes->name}}  </td>
                    <td>{{ $Applicantes->Name_School}}  </td>
                    <td> {{ $Applicantes->Address}}</td>
                    <td>{{$Applicantes->Grade}}</td>
                    <td>
                    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <div class="text-center">
                  <img id="showImage" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($Applicants->user->profile_image))? url(  'upload/profile_image/'.$Applicants->user->profile_image):url('upload/no_image.jpg')}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $Applicantes->user->name }}</h3>

                <p class="text-muted text-center">{{$Applicantes->user->email}}</p>

  

        
              </div>
              <!-- /.card-body -->
            </div>



                    </td>
                    <td>
                    <div>
                    <a href=""class ="btn btn-sm btn-success">
                      <i class="fas fa-comments"></i>&nbsp; Appove
</a>
</div>
<h1></h1>
<div>
                    <a href=""class ="btn btn-sm btn-info">
                      <i class="fas fa-inbox"></i>&nbsp; Details
</a>
</div>
                        
                    </td>
                  </tr>
                  @endforeach
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../../toaster/toastr.min.js"></script>
<script src="../../toaster/sweetalert.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });
</script>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
   
  });
</script>
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
   
  });
</script>

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

</body>
</html>

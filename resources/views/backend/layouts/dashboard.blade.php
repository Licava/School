
@extends('backend.layouts.app')
@section('content')
<aside class="main-sidebar sidebar-dark-info elevation-4">
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
            <a href="{{URL::to('/Dashboard')}}" class="nav-link active">
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
            <a href= "{{URL::to('/AddUser-index')}}"class="nav-link ">
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            @if(auth()-> user() ->role=='Admin')
            <div class="small-box bg-info">
              <div class="inner">
        
                <h3>{{auth()-> user()->where('role', 'Student')->count()}}</h3>
             
                <p>Number of Students</p>

            
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{auth()-> user()->where('role', 'Admin')->count()}}<sup style="font-size: 20px"></sup></h3>

                <p>Number of Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{auth()-> user()->count()}}</h3>

                <p>Total of Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      @endif
          @if(auth()-> user() ->role=='Student')
          <div class="small-box bg-info">
              <div class="inner">
        
                <h3>2</h3>

                <p>Number of Students</p>

            
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px"></sup></h3>

                <p>Number of Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>  }</h3>

                <p>Total of Users</p>
              </div>
           
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$scholarshipss}}</h3>

                <p>Total of number Scholarship</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"> {{auth()->user()->role}} - Dashboard</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
             
              <!-- /.card-header -->
             	
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
      Welcome {{auth()->user()->role}} - Dashboard
      </div>
    </div>
  </div>
        <!-- Main row -->
      
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
  @endsection
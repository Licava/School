
@extends('backend.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
          @if(auth()-> user() ->role=='Admin')
          <div class="col-sm-12 d-flex justify-content-between">
          <a></a>
        
            <a href="{{ URL::to('/AddScholarship') }}" class="btn btn-sm btn-success" >Add Scholarship</a>
          </div>
          @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <div></div>
    <!-- Main content -->

      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
      
            @forelse($alls as $Scholarship)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> {{ $Scholarship->title}} </b></h2>
                      <p class="text-muted text-sm"><b>About: </b>  </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Address : Sa tabing dagat</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Manage By: {{$Scholarship->user->name}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{(!empty($Scholarship->image))? url('upload/image/'.$Scholarship->image):url('upload/no_image.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                @if(auth()-> user() ->role=='Admin')
                <div class="card-footer">
                  <div class="text-right">
                
                  <a href="  {{ URL::to('/delete-scholarship/'.$Scholarship->id) }}" class="btn btn-sm btn-danger" id="delete">
                      <i class="fas fa-comments"></i> Delete
                    </a>
                  <a href="  {{ URL::to('/Scholarship/'.$Scholarship->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-comments"></i> Edit
                    </a>
                    <a href="{{ URL::to('/Applicants/'.$Scholarship->id) }}" class="btn btn-sm btn-info">
                      <i class="fas fa-comments"></i> View Applicants
                    </a>
                   
                  </div>
                </div>
                @endif
                @if(auth()-> user() ->role=='Student')
                <div class="card-footer">
           
                  <div class="text-right">
                
                  <i class=" fas fa-solid fa-circle d-inline "   style = "color:#0BDA51"></i>
                 
                   
                  <a href="#" class="btn btn-sm btn-success">
                      <i class="fas fa-comments"></i> Details
                    </a>
                   
                   @if($Scholarship->id != $Scholarship->student?->scholarship_id)
                  
                    <a href="  {{ URL::to('/Apply/'.$Scholarship->id) }}"class ="btn btn-sm btn-danger">
                      <i class="fas fa-comments"></i>Apply
</a>
           
                  @endif
                  
                  </div>
                </div>
           
               @endif

               
              </div>
            </div>
            @empty
            @endforelse
            
          </div>
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

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
  @endsection
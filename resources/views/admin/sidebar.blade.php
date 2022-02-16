
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
  
    <link href="{{ asset('admin/assets/demo/demo.css') }}" rel="stylesheet" />
  </head>
  
  <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="https://www.creative-tim.com" class="simple-text logo-mini">
  
          </a>
          <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            <img style="margin-top: -21px;height: 57px;width: 134px;" src="{{ asset('../art_logo.png') }}" width="125" height="81"/>
  
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
  
              <a href='{{ route('user_management')}}'>
                <i class="nc-icon nc-circle-10"></i>
                <p>User Management</p>
              </a>
            </li>
            <li>
              <a href='{{ route('post_management')}}'>
                <i class="nc-icon nc-album-2"></i>
                <p>Post Management</p>
              </a>
            </li>
            <li>
              <a href='{{ route('permission_management')}}'>
                <i class="nc-icon nc-check-2"></i>
                <p>Permission Management</p>
              </a>
            </li>
            <li>
              <a href='{{ route('tag_management')}}'>
                <i class="nc-icon nc-tag-content"></i>
                <p>Tag Management</p>
              </a>
            </li>
            <li>
              <a href='{{ route('top_list_management')}}'>
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Top List Management</p>
              </a>
            </li>
            <li>
              <a href='{{ route('comment_management')}}'>
                <i class="nc-icon nc-caps-small"></i>
                <p>Comment Management</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel" style="height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <!-- <a class="navbar-brand" href="javascript:;">Title</a> -->
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Log Out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  

        <!--   Core JS Files   -->
  <script src={{ asset('admin/assets/js/core/jquery.min.js') }}></script>
  <script src={{ asset('admin/assets/js/core/popper.min.js') }}></script>
  <script src={{ asset('admin/assets/js/core/bootstrap.min.js') }}></script>
  <script src={{ asset('admin/assets/js/plugins/chartjs.min.js') }}></script>
  <!--  Notifications Plugin    -->
  <script src={{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}></script>
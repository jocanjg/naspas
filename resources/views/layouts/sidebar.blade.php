<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <!-- <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"> -->
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div><br><br>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview"><a href="{{ url('dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <li><a href="{{ url('animals')}}"><i class="fa fa-link"></i> <span>Animals Management</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('box')}}">Box Number</a></li>
          <li><a href="">Status</a></li>
          <li><a href="{{ url('nacin')}}">Way of catching</a></li>
          <li><a href="{{ url('reasons')}}">Reason for catching</a></li>
          <li><a href="{{ url('locations')}}">Locations</a></li>
          <li><a href="{{ url('sorts')}}">Sorts</a></li>
          <li><a href="">Size</a></li>
          <li><a href="{{ url('reports')}}">Report</a></li>
        </ul>
      </li>
      <li><a href="{{ route('users.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

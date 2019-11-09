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
        <a href="#"><i class="fa fa-circle text-success"></i>Na mreži</a>
      </div><br><br>
    </div>

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview"><a href="{{ url('dashboard')}}"><i class="fa fa-server "></i> <span>Početna strana</span></a></li>
      <li><a href="{{ url('animals')}}"><i class="fa fa-paw "></i> <span>Psi i Mačke</span></a></li>
@if( Gate::check('isAdmin') || Gate::check('isAuthor') )
      <li class="treeview">
        <a href="#"><i class="fa fa-cog"></i> <span>Podešavanje sistema</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('box')}}"><i class="fa fa-th"></i>Kavezi</a></li>
          <!-- <li><a href="">Status</a></li> -->
          <li><a href="{{ url('nacin')}}"><i class="fa fa-hand-lizard-o"></i>Način hvatanja</a></li>
          <li><a href="{{ url('reasons')}}"><i class="fa fa-question"></i>Razlog hvatanja</a></li>
          <li><a href="{{ url('locations')}}"><i class="fa fa-location-arrow"></i>Lokacija</a></li>
          <li><a href="{{ url('sorts')}}"><i class="fa fa-paw"></i>Vrste / Rase</a></li>
          <li><a href="{{ url('statuses')}}"><i class="fa fa-home"></i>Status</a></li>
          <li><a href="{{ url('reports')}}"><i class="fa fa-file"></i>Izveštaji</a></li>
        </ul>
      </li>
    @can('isAdmin')  <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Korisnici</span></a></li>@endcan
      @endif
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

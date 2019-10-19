<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="{{ url('dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img class="center-block" src="https://png.pngtree.com/templates_detail/20180926/pet-shop-dogs-animal-health-care-png_34189.jpg" width="45" height="45" alt="Google" id="logo" style="z-index: 4; position: relative;"><b>M</b>P</span>

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{{ config('app.name', 'NASPAS') }}</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <!-- <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"> -->
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">

              <p>
                Dobrodošli {{ Auth::user()->name }}
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
             @if (Auth::guest())
                <div class="pull-left">
                  <a href="{{ route('login') }}" class="btn btn-default btn-flat">Prijava</a>
                </div>

             @else
               <div class="pull-left">
                  <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profil</a>
                </div>
               <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Odjava
                  </a>
               </div>
              @endif
            </li>
          </ul>
          <!-- <li>
           <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
         </li> -->
        </li>
      </ul>
    </div>
  </nav>
</header>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>

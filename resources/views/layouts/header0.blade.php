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
      
      </ul>
    </div>
  </nav>
</header>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>

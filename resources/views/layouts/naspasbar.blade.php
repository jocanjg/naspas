<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->


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
      <li class="treeview"><a href="{{ url('/pretraga')}}"><i class="fa fa-server "></i> <span>Naspas Baza</span></a></li>
      <li><a href=""><i class="fa fa-paw "></i> <span>Doniraj i Pomozi</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-shopping-cart"></i> <span>Prodavnica</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-truck"></i>Oprema</a></li>
          <!-- <li><a href="">Status</a></li> -->
          <li><a href=""><i class="fa fa-truck"></i>Hrana</a></li>

        </ul>
      </li>
      <li><a href=""><i class="fa fa-users"></i> <span>Registruj se</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

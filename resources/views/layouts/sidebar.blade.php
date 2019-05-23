  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("theme/dist/img/gambia.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->fname }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        @if(Auth::user()->role->view_dashboard)
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @endif
        <li>
          <a href="{{ url('property')}}"><i class="fa fa-home"></i> <span>Property</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        @if(Auth::user()->role->create_payment)
        <li>
          <a href="{{ url('payment')}}"><i class="fa fa-money"></i> <span>Payment</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{ url('agent')}}"><i class="fa fa-users"></i> <span>Agents</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('land_lord') }}"><i class="fa fa-map"></i> <span>Land Lord</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li>
          <a href="{{ url('customer') }}"><i class="fa fa-group"></i> <span>Customer</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('construction') }}"><i class="fa fa-building"></i> <span>Construction</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        @if(Auth::user()->role->view_report)
        <li>
          <a href="{{ url('report') }}"><i class="fa fa-bar-chart"></i> <span>Reports</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        @endif

        @if(Auth::user()->role->create_user)
        <li class="treeview">
          <a href="#"><i class="fa fa-user-plus"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i>Users</a></li>
            @if(Auth::user()->role->create_role)
            <li><a href="{{ url('roles') }}"><i class="fa fa-circle-o"></i>Roles</a></li>
            @endif
          </ul>
        </li>
        @endif

        <li>
          <a href="{{ url('advanced') }}"><i class="fa fa-settings"></i> <span>Advanced</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


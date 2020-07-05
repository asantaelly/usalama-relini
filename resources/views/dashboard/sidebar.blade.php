<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-hard-hat"></i>
      </div>
      <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    @if(Auth::user()->is_admin && Auth::user()->hasRole('superuser'))

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('manage.users')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>User Management</span></a>
      </li>
      
    @endif

      <!-- Nav Item - Charts -->
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('inspection.form')}}">
          <i class="fas fa-fw fa-clipboard-check"></i>
          <span>Inspection</span></a>
      </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-bell"></i>
        <span>Safety</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
          <a class="collapse-item" href="{{route('accident.index')}}">Accident Logs</a>
          <a class="collapse-item" href="{{route('officer.index')}}">Officer Concerned</a>
          <a class="collapse-item" href="{{route('progress.index')}}">Progress Report</a>
          <a class="collapse-item" href="{{route('section.index')}}">Sections</a>
          <a class="collapse-item" href="{{route('death.index')}}">Death Type</a>
          <a class="collapse-item" href="{{route('injury.index')}}">Injury Type</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-clipboard-check"></i>
        <span>Inspection</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('inspection.details')}}">Inspection Details</a>
          <a class="collapse-item" href="{{ route('inspection.form')}}">Inspection Form</a>
          {{-- <a class="collapse-item" href="#">Traffic</a>
          <a class="collapse-item" href="#">Telecom & ICT</a>
          <a class="collapse-item" href="#">Electrical System</a> --}}
        </div>
      </div>
    </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-hard-hat"></i>
        <span>Risk Management</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('risk_identification.index')}}">Risk Identification</a>
          <a class="collapse-item" href="{{ route('risk_control.index')}}">Risk Control</a>
          <a class="collapse-item" href="{{ route('inspection.form')}}">Fore Casting</a>
          <a class="collapse-item" href="{{ route('inspection.form')}}">Standard & Comparison</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
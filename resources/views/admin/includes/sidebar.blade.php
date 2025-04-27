<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
            class="logo-name">Otika</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{route('admin.dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Category</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.category.create')}}">Create</a></li>
            <li><a class="nav-link" href="{{ route('admin.category') }}">Manage</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Brand</span></a>
          <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{ route('brand.create')}}">Create</a></li> --}}
            <li><a class="nav-link" href="{{ route('admin.brand') }}">Manage</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Color</span></a>
          <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{ route('color.create')}}">Create</a></li> --}}
            <li><a class="nav-link" href="{{ route('admin.color') }}">Manage</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Size</span></a>
          <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{ route('color.create')}}">Create</a></li> --}}
            <li><a class="nav-link" href="{{ route('admin.size') }}">Manage</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Product</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.product.create')}}">Create</a></li>
            <li><a class="nav-link" href="{{ route('admin.product') }}">Manage</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Apps</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="chat.html">Chat</a></li>
            <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
          </ul>
        </li>








      </ul>
    </aside>
  </div>

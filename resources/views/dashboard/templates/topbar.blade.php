<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
  <a class="navbar-brand" href="/dashboard/homes/index">{{Helper::general()->title}}</a>
  <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
          data-feather="menu"></i></button>
  <ul class="navbar-nav align-items-center ml-auto">
    <li class="nav-item dropdown no-caret mr-2 dropdown-user">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
            href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><img class="img-fluid"
                src="{{asset(Auth::user()->avatar)}}" /></a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
            aria-labelledby="navbarDropdownUserImage">
            <h6 class="dropdown-header d-flex align-items-center">
                <div class="image mr-2" style="width: 50px; height: 50px;">
                    <img class="dropdown-user-img" src="{{asset(Auth::user()->avatar)}}" style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
                <div class="dropdown-user-details">
                    <div class="dropdown-user-details-name">{{Auth::user()->name}}</div>
                    <div class="dropdown-user-details-email">{{Auth::user()->email}}</div>
                </div>
            </h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#!">
                <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                Account
            </a>
            <button class="dropdown-item" type="button" data-toggle="modal"
            data-target="#exampleModalLg">
                <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                Logout
            </button>
        </div>
    </li>
  </ul>
</nav>
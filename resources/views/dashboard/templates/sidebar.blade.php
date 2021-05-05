@php
  $role_id = Auth::user()->role_id;
  $main_menu = '/' . Request::segment(1) . '/' . Request::segment(2);
  $main_submenu = '/' . Request::path(); 
  
  $menu = DB::table('menus')
      ->join('access_menus', 'menus.id', '=', 'access_menus.menu_id')
      ->where('access_menus.role_id', $role_id)->orderBy('menus.urutan', 'ASC')
      ->get();
@endphp

<div class="sidenav-menu-heading">Admin Panel</div>

@foreach ($menu as $m)
  @php
    $submenu = DB::table('submenus')
    ->join('access_submenus', 'submenus.id', '=', 'access_submenus.submenu_id')
    ->where(['access_submenus.role_id' => $role_id, 'submenus.menu_id' => $m->menu_id, 'submenus.is_active' => 1])
    ->get();
  @endphp

  @if (count($submenu) == 1)
    <a class="nav-link menu {{$m->url == $main_menu ? 'active-menu' : ''}}" href="{{$submenu[0]->url}}">
      <div class="nav-link-icon"><i data-feather="{{$m->icon}}"></i></div>
      {{$m->menu}}
    </a>
  @else
    <a class="nav-link menu {{$m->url != $main_menu ? 'collapsed' : ''}} {{$m->url == $main_menu ? 'active-menu' : ''}}" href="javascript:void(0);" data-toggle="collapse"
      data-target="#{{strtolower(str_replace(' ', '-', $m->menu))}}" aria-expanded="{{$m->url != $main_menu ? 'true' : 'false'}}" aria-controls="{{strtolower(str_replace(' ', '-', $m->menu))}}">
      <div class="nav-link-icon"><i data-feather="{{$m->icon}}"></i></div>
      {{$m->menu}}
      <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    
    <div class="collapse {{$m->url == $main_menu ? 'show' : ''}}" id="{{strtolower(str_replace(' ', '-', $m->menu))}}" data-parent="#accordionSidenav">
      <nav class="sidenav-menu-nested mt-2 nav">
        @foreach ($submenu as $sm)
          <a class="nav-link pt-0 {{$m->url == $main_submenu ? 'active' : ''}}" href="{{$sm->url}}">{{$sm->submenu}}</a>
        @endforeach
      </nav>
    </div>
  @endif
@endforeach
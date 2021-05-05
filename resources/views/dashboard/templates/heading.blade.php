@php
  $permission = Helper::permission();
  $url_submenu = '/' . Request::segment(1) . '/' . Request::segment(2) . '/' . Request::segment(3);
  $submenu = DB::select("SELECT submenu FROM submenus WHERE url = '$url_submenu'");
  $menu = '/' . Request::segment(1) . '/' . Request::segment(2);
  $menu = DB::select("SELECT menu FROM menus WHERE url = '$menu'");
@endphp
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
  <div class="mr-4 mb-3 mb-sm-0">
      <h1 class="mb-0">{{$submenu[0]->submenu}}</h1>
      <div class="small">
          <a href="/dashboard/homes/index" class="font-weight-500 text-decoration-none text-primary">Dashboard</a>
          &#xB7; {{$menu[0]->menu}} &#xB7; {{$submenu[0]->submenu}}
      </div>
  </div>
  
  @if ($permission !== null)
    @if ($permission->create == 1)
      @if (Route::current()->getName() == Request::segment(3) . '.index')
      <a href="{{$permission->url . '/create'}}" class="btn btn-white btn-sm line-height-normal text-white p-3 bg-gradient-primary-to-secondary" id="reportrange">
        <i class="fa fa-plus fa-sm"></i>
        <span class="ml-2">Tambah Data</span>
      </a>
      @endif
    @endif
  @endif  
</div>
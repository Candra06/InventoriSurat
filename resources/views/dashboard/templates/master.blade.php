<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard | {{ucfirst(Request::segment(2))}}</title>
  
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">

  <script src="{{asset('assets/js/all.min.js')}}"></script>
  <script src="{{asset('assets/js/feather.min.js')}}"></script>

  @stack('styles')
</head>

<body class="nav-fixed">

  @include('dashboard.templates.topbar')

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
          <div class="sidenav-menu">
              <div class="nav accordion" id="accordionSidenav">
                @include('dashboard.templates.sidebar')
              </div>
          </div>
          <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
            </div>
          </div>
        </nav>
      </div>

      <div id="layoutSidenav_content">
        <main>
            <div class="container mt-5">
              @include('dashboard.templates.heading')
              @yield('content')
            </div>
        </main>

        <footer class="footer mt-auto bg-white">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6 small">
                    Copyright &#xA9; <a href="http://hendrawan.tech" class="text-decoration-none text-primary">HendrawanTech</a> 2020
                  </div>
                  <div class="col-md-6 text-md-right small">
                      <a href="#!">Privacy Policy</a>
                      &#xB7;
                      <a href="#!">Terms &amp; Conditions</a>
                  </div>
              </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Logout</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
              </div>
              <div class="modal-body">
                  <p><b>{{ Auth::user()->name }}</b>, apakah anda yakin ingin keluar?</p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success"
                      type="button" data-dismiss="modal">Close</button>
                      <a class="btn btn-danger" href="" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top:100px;">
        <form action="" method="POST" name="formdelete">
          @method('delete')
          @csrf
          <div class="modal-header">
            <h4 class="modal-title" style="text-align:center;">Delete Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus data ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script type="text/javascript">
    function modal_konfir(url) {
      $('#modal_delete').modal('show', {
        backdrop: 'static'
      });
      document.formdelete.action = url;
    }
    
    function modal_konfir_custom(url, pesan) {
        $('#modal_konfirmasi').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('link_goto').setAttribute('href', url);
        document.getElementById('modal_pesan').innerHTML = pesan;
    }
  </script>

  @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin EugenBlog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet"
    href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }} ">
  {{-- summernote --}}
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet"
    href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
  <!-- Daterange picker -->
  <link rel="stylesheet"
    href="{{ asset('plugins/daterangepicker/daterangepicker.css') }} ">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('222')}} dist/img/AdminLTELogo.png" alt="AdminLTELogo"
        height="60" width="60">
    </div> --}}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <div class="col-12">
        <ul class="navbar-nav d-flex justify-content-between">
          <div class="right-nav d-flex">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="" role="button"><i
                  class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('main.posts.index') }}">На
                главную</a>
            </li>
          </div>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav mr-4">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Выйти из аккаунта') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    @include('admin.includes.sidebar')

    @yield('content')

    <footer class="main-footer">
      <strong>Blog constructed by Eugen Bahenov</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }} "></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Select2 -->
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }} "></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }} "></script>
  <!-- overlayScrollbars -->
  <script
    src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} ">
  </script>
  <!-- bs-custom-file-input -->
  <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
  </script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }} "></script>
  <script src="https://kit.fontawesome.com/0b50121546.js" crossorigin="anonymous"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote({
        height: 400,
        toolbar: [
          // [groupName, [list of button]]
          ['style'],
          ['font', ['underline', 'bold', 'clear']],
          ['fontname'],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table'],
          ['height', ['height']],
          ['view', ['fullscreen', 'help']]
        ]
      })

      //Initialize Select2 Elements
      $('.select2').select2()
    })
    // BsCustomFile
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>

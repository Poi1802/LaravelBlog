<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bazhen :: Blog</title>
  <link rel="stylesheet"
    href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
  <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('assets/js/loader.js') }} "></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="edica-loader"></div>
  <header class="edica-header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand font-bold text-info" style="font-weight: 900"
          href="{{ route('main.posts.index') }}">EugenBlog</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
          data-target="#edicaMainNav" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="edicaMainNav">
          <ul class="navbar-nav flex-grow-1 text-center mx-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('main.posts.index') }}">Главная<span
                  class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('main.about') }}">О нас</a>
            </li>
          </ul>
          @if (!Auth::user())
            <ul class="navbar-nav mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Войти</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Зарегестрироваться</a>
              </li>
            </ul>
          @else
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="" id="blogDropdown"
                  data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu" aria-labelledby="blogDropdown">
                  @if (Auth::user()->isAdmin())
                    <a class="dropdown-item" href="{{ route('admin.main.index') }}">Админ
                      панель</a>
                  @endif
                  <a class="dropdown-item"
                    href="{{ route('personal.main.index') }}">Персональная
                    панель</a>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Выйти из аккаунта') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          @endif
        </div>
      </nav>
    </div>
  </header>

  @yield('content')

  {{-- Downloader maybe comming soon --}}
  {{-- <section class="edica-footer-banner-section">
    <div class="container">
      <div class="footer-banner" data-aos="fade-up">
        <h1 class="banner-title">Download it now.</h1>
        <div class="banner-btns-wrapper">
          <button class="btn btn-success"> <img
              src="{{ asset('assets/images/apple@1x.svg') }} " alt="ios"
              class="mr-2"> App Store</button>
          <button class="btn btn-success"> <img
              src="{{ asset('assets/images/android@1x.svg') }} " alt="android"
              class="mr-2"> Google Play</button>
        </div>
        <p class="banner-text">Add some helper text here to explain the finer details of
          your <br> product or service.</p>
      </div>
    </div>
  </section> --}}
  <footer class="edica-footer" data-aos="fade-up">
    <div class="container">
      <div class="footer-widget-area">
        <div class="col-md-6 d-flex flex-column mx-auto" style="width: fit-content">
          <h1 class="text-white" data-aos="fade-up">По деловым вопросам:</h1>
          <p class="contact-details mx-auto" style="width: fit-content">
            evgen.bazhenov.2002@gmail.com</p>
          <p class="contact-details mx-auto" style="width: fit-content">+7 999 420 23 04
          </p>
          <nav class="footer-social-links mx-auto" style="width: fit-content">
            <a href="https://vk.com/baen1802"><i class="fab fa-vk"></i></a>
            <a href="https://t.me/poiZd1802"><i class="fab fa-telegram"></i></a>
          </nav>
        </div>
        <div class="footer-bottom-content justify-content-center">
          <p class="mb-0">© EugenBlog.2023 . Все права защищены.</p>
        </div>
      </div>
  </footer>
  <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }} "></script>
  <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }} "></script>
  <script src="{{ asset('assets/vendors/aos/aos.js') }} "></script>
  <script src="{{ asset('assets/js/main.posts.js') }} "></script>
  <script>
    AOS.init({
      duration: 1000
    });
  </script>
</body>

</html>

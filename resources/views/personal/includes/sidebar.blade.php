@php
  $postsCount = Auth::user()
      ->posts()
      ->count();
  $commentsCount = Auth::user()
      ->userComments()
      ->count();
  $likesCount = Auth::user()
      ->likedPosts()
      ->count();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('personal.main.index') }}" class="brand-link text-decoration-none">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Personal EugenBlog</span>
  </a>

  <!-- Sidebar -->
  <div
    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
    <div class="os-resize-observer-host observed">
      <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed"
      style="height: calc(100% + 1px); float: left;">
      <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 397px;">
    </div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible"
        style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }} "
                class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#"
                class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
              role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
              <li class="nav-header">BLOG</li>
              <li class="nav-item">
                <a href="{{ route('personal.posts.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-newspaper"></i>
                  <p>
                    Посты
                    <span class="badge badge-info right">{{ $postsCount }}</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('personal.comments.index') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-comments"></i>
                  <p>
                    Комментарии
                    <span class="badge badge-info right">{{ $commentsCount }}</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('personal.likes.index') }}" class="nav-link">
                  <i class="nav-icon text-danger fa-solid fa-heart"></i>
                  <p>
                    Лайки постам
                  </p>
                  <span class="badge badge-info right">{{ $likesCount }}</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
    </div>
    <div
      class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px);">
        </div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle"
          style="height: 29.2862%; transform: translate(0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar-corner"></div>
  </div>
  <!-- /.sidebar -->
</aside>

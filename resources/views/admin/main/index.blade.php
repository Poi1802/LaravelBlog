@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Административная панель</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Административная панель
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $postsCount }}</h3>

                <p>Статьи</p>
              </div>
              <div class="icon">
                <i class="ion fa-solid fa-newspaper"></i>
              </div>
              <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Перейти <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $usersCount }}</h3>

                <p>Пользователи</p>
              </div>
              <div class="icon">
                <i class="ion fa-solid fa-users"></i>
              </div>
              <a href="{{ route('admin.users.index') }}" class="small-box-footer">Перейти <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $catsCount }}</h3>

                <p>Категории</p>
              </div>
              <div class="icon">
                <i class="ion fa-solid fa-table-list"></i>
              </div>
              <a href="{{ route('admin.categories.index') }}"
                class="small-box-footer">Перейти <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $tagsCount }}</h3>

                <p>Теги</p>
              </div>
              <div class="icon">
                <i class="ion fa-solid fa-tags"></i>
              </div>
              <a href="{{ route('admin.tags.index') }}" class="small-box-footer">Перейти
                <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

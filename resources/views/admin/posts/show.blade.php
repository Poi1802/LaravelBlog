@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Статья: {{ $post->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="d-flex">
          <div class="">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-info">Добавить
              статью</a>
          </div>
          <div class="col-1">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Назад</a>
          </div>
        </div>
        <!-- /.row -->
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered ">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Название статьи</th>
                      <th>Категория</th>
                      <th>Теги</th>
                      <th style="width: 23%" class="text-center">Управление</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $post->id }}.</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        @foreach ($post->tags as $tag)
                          {{ $tag->name . ', ' }}
                        @endforeach
                      </td>
                      <td>
                        <div class="d-flex justify-content-center">
                          <a href="{{ route('admin.posts.show', $post->id) }}"
                            class="mr-4 edit_pen" style="font-size: 20px">
                            <i class="fa-regular fa-eye"></i>
                          </a>
                          <a href="{{ route('admin.posts.edit', $post->id) }}"
                            class="mr-4 edit_pen" style="font-size: 20px">
                            <i class="fa-regular fa-pen-to-square"></i>
                          </a>
                          <form action="{{ route('admin.posts.destroy', $post->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-white trash"
                              style="font-size: 20px;">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-body">
                <div class="col-6 fs-5 text-bold">
                  Содержание
                </div>
                <hr>
                <div class="col-12">
                  {{ $post->content }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

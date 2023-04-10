@extends('personal.layouts.main')
@php
  use App\Models\User;
@endphp
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Комментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('personal.main.index') }}">Персональная панель</a></li>
              <li class="breadcrumb-item active">Комментарии</li>
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
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered ">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Название поста</th>
                      <th>Комментарий</th>
                      <th style="width: 23%" class="text-center">Управление</th>
                    </tr>
                  </thead>
                  @foreach ($userComments as $comment)
                    <tbody>
                      <tr>
                        <td>{{ $comment->id }}.</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="{{ route('main.posts.show', $comment->post_id) }}"
                              class="mr-4 edit_pen" style="font-size: 20px">
                              <i class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ route('personal.comments.edit', $comment->id) }}"
                              class="mr-3 edit_pen" style="font-size: 20px">
                              <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form
                              action="{{ route('personal.comments.destroy', $comment->id) }}"
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
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
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

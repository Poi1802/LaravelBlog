@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Понравившиеся посты</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('personal.main.index') }}">Персональная панель</a></li>
              <li class="breadcrumb-item active">Понравившиеся посты</li>
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
        </div>
        <!-- /.row -->
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered ">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Заголовок поста</th>
                      <th style="width: 23%" class="text-center">Управление</th>
                    </tr>
                  </thead>
                  {{-- @dd($postLikes) --}}
                  @foreach ($likedPosts as $post)
                    <tbody>
                      <tr>
                        <td>{{ $post->id }}.</td>
                        <td>{{ $post->title }}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="{{ route('main.posts.show', $post->id) }}"
                              class="mr-4 edit_pen" style="font-size: 20px">
                              <i class="fa-regular fa-eye"></i>
                            </a>
                            <form action="{{ route('personal.likes.destroy', $post->id) }}"
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

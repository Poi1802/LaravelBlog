@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение комментария</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('personal.main.index') }}">Персональная панель</a></li>
              <li class="breadcrumb-item active"><a
                  href="{{ route('personal.comments.index') }}">Комментарии</a></li>
              <li class="breadcrumb-item active">Измение комментария </li>
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
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Заполните поля</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('personal.comments.update', $comment->id) }}"
                method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3"
                      class="col-12 col-form-label">Комментарий</label>
                    <div class="col-sm-10">
                      <div>
                        <input type="text"
                          class="form-control @error('comment') border-danger @enderror"
                          name="comment" id="inputEmail3"
                          value="{{ old('comment') ?? $comment->comment }}"
                          placeholder="Комментарий">
                      </div>
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Изменить</button>
                    <a href="{{ route('personal.comments.index') }}"
                      class="btn btn-default float-right">Назад</a>
                  </div>
                  <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

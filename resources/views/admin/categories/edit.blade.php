@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение категории</h1>
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
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Заполните поля</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.category.update', $category->id) }}"
                method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3"
                      class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                      <div>
                        <input type="text"
                          class="form-control @error('name') border-danger @enderror"
                          name="name" id="inputEmail3" value="{{ $category->name }}"
                          placeholder="Название категории">
                      </div>
                      @error('name')
                        <div class="text-danger">Обзательное поле</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Изменить</button>
                  <a href="{{ route('admin.category.index') }}"
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

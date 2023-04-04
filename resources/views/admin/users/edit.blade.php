@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение пользователя</h1>
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
              <form action="{{ route('admin.users.update', $user->id) }}" method="post"
                class="form-horizontal">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Имя</label>
                    <div class="col-sm-10">
                      <div>
                        <input type="text"
                          class="form-control @error('name') border-danger @enderror"
                          name="name" id="inputEmail3"
                          value="{{ old('name') ?? $user->name }}"
                          placeholder="Имя пользователя">
                      </div>
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <div>
                        <input type="text"
                          class="form-control @error('email') border-danger @enderror"
                          name="email" value="{{ old('email') ?? $user->email }}"
                          id="inputEmail3" placeholder="Email пользователя">
                      </div>
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-12 form-label">Новый пароль(если
                      нужно)</label>
                    <div class="col-sm-10">
                      <div>
                        <input type="text"
                          class="form-control @error('password') border-danger @enderror"
                          name="password" value="{{ old('password') }}" id="inputEmail3"
                          placeholder="Новый пароль пользователя">
                      </div>
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Роль</label>
                    <div class="col-sm-10">
                      <div>
                        <select class="select2 col-3" name="role" id="">
                          @foreach ($roles as $id => $role)
                            <option @selected(old('role') ?? $user->role == $id)
                              value="{{ $id }}">{{ $role }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('role')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Изменить</button>
                  <a href="{{ route('admin.users.index') }}"
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

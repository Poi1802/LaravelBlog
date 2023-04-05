@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение статьи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('admin.main.index') }}">Административная панель</a></li>
              <li class="breadcrumb-item active"><a
                  href="{{ route('admin.posts.index') }}">Статьи</a></li>
              <li class="breadcrumb-item active">Изменение статьи: {{ $post->title }}</li>
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
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Заполните поля</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.posts.update', $post->id) }}"
                enctype="multipart/form-data" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group d-flex">
                    <div class="title col-sm-4">
                      <label>Название</label>
                      @error('title')
                        <label class="text-danger"> - это обзательное поле</label>
                      @enderror
                      <div class="">
                        <div>
                          <input type="text"
                            class="form-control @error('title') border-danger @enderror"
                            name="title" value="{{ old('title') ?? $post->title }}"
                            placeholder="Название статьи">
                        </div>
                      </div>
                    </div>
                    <div class="category col-sm-4">
                      <label>Категория</label>
                      @error('category_id')
                        <label class="text-danger"> - это обзательное поле</label>
                      @enderror
                      <select
                        class="form-control select2 @error('category_id') border-danger @enderror"
                        name="category_id">
                        <option value="">Выберите категорию</option>
                        @foreach ($categories as $category)
                          <option @selected(old('category_id') ?? $post->category_id == $category->id) value="{{ $category->id }}">
                            {{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="tags col-sm-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Теги</label>
                        @error('tag_ids')
                          <label class="text-danger"> - это обзательное поле</label>
                        @enderror
                        <select multiple="multiple"
                          class="select2 @error('tags') border-danger @enderror"
                          size="2" id="exampleFormControlSelect1"
                          data-placeholder='Выберите теги' style="width: 100%;"
                          name="tag_ids[]">
                          @foreach ($tags as $tag)
                            <option @selected(in_array($tag->id, old('tag_ids') ?? $post->tags->pluck('id')->toArray()))
                              value="{{ $tag->id }}">
                              {{ $tag->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="preview-img col-4">
                      @if ($post->preview_img)
                        <div>
                          <span class="text-bold mr-1">Текущее:</span>
                          <div>
                            <img class="w-25 rounded"
                              src="{{ url('storage\\' . $post->preview_img) }}"
                              style="height: 100px; min-width: 130px" alt="">
                          </div>
                        </div>
                        <hr>
                      @endif
                      <label for="exampleInputFile">Превью</label>
                      @error('preview_img')
                        <label class="text-danger"> - это обязательное поле</label>
                      @enderror
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"
                            accept="image/gif,image/png,image/jpeg,image/pjpeg,image/heic"
                            class="custom-file-input" name="preview_img"
                            value="{{ old('preview_img') }}" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Выберите
                            файл</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Загрузить</span>
                        </div>
                      </div>
                    </div>
                    <div class="main-img col-4">
                      @if ($post->main_img)
                        <div class="">
                          <div class="text-bold mr-1">Текущее:</div>
                          <div>
                            <img class="w-25 rounded"
                              src="{{ url('storage\\' . $post->main_img) }}"
                              style="max-height: 100px; min-width: 130px" alt="">
                          </div>
                        </div>
                        <hr>
                      @endif
                      <label for="exampleInputFile">Главное изображение</label>
                      @error('main_img')
                        <label class="text-danger"> - это обязательное поле</label>
                      @enderror
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"
                            accept="image/gif,image/png,image/jpeg,image/pjpeg,image/heic"
                            class="custom-file-input" name="main_img"
                            value="{{ old('main_img') ?? $post->main_img }}"
                            id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Выберите
                            файл</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Загрузить</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-12">
                    <label for="inputEmail3" class="col-form-label">Содержание
                      статьи</label>
                    @error('content')
                      <label class="text-danger"> - это обязательное поле</label>
                    @enderror
                    <textarea name="content" id="summernote">{{ old('content') ?? $post->content }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Изменить</button>
                  <a href="{{ route('admin.posts.index') }}"
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

@extends('layouts.main')

@section('content')
  {{-- @dd($post->comments) --}}
  <main class="blog-post">
    <div class="container">
      <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
      <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Написал
        {{ $post->user->name }} • {{ $date->translatedFormat('F') }} {{ $date->day }},
        {{ $date->year }} • {{ $date->format('H:i') }} •
        {{ $post->category->name }} •
        {{ $post->comments->count() }}
        {{ Lang::choice('Комментарий|Комментариев', $post->comments->count()) }}
      </p>
      <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
        <img src="{{ $post->main_img }}" alt="featured image" class="w-100"
          style="max-height: 320px; object-fit: contain">
      </section>
      <section class="post-content">
        <div class="row">
          <div class="col-lg-9 mx-auto" data-aos="fade-up">
            {!! $post->content !!}
          </div>
      </section>
      <div class="row">
        <div class="col-lg-9 mx-auto">
          <section class="related-posts">
            <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
            <div class="row">
              @foreach ($relatedPosts as $relatedPost)
                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                  <a href="{{ route('main.posts.show', $relatedPost->id) }}">
                    <img src="{{ $relatedPost->preview_img }}" alt="related post"
                      class="post-thumbnail">
                  </a>
                  <a href="">
                    <p class="post-category">{{ $relatedPost->category->name }}</p>
                  </a>
                  <a href="{{ route('main.posts.show', $relatedPost->id) }}">
                    <h5 class="post-title">{{ $relatedPost->title }}</h5>
                  </a>
                </div>
              @endforeach
            </div>
          </section>
          <section class="comment-section">
            <h2 class="section-title mb-5" data-aos="fade-up">
              {{ $post->comments->count() }} •
              {{ Lang::choice('комментарий|комментариев', $post->comments->count()) }}</h2>
            <div class="comments mb-4">
              @foreach ($post->comments as $comment)
                <div class="card-comment mb-4">
                  <!-- User image -->
                  <div class="comment-head mb-1">
                    {{-- <img class="img-circle position-absolute rounded-circle img-sm"
                      src="../dist/img/user3-128x128.jpg" alt="User Image"
                      style="max-width: 40px;box-shadow: 0.24em 0.24em 0.2em 0 rgba(15, 28, 63, 0.125);"> --}}
                    <div class="position-absolute rounded-circle"
                      style="width: 40px;
                      height:40px;background: #5a79d5;
                      box-shadow: 0.24em 0.24em 0.2em 0 rgba(15, 28, 63, 0.125);">
                    </div>
                    <span class="username ml-5" style="font-weight: 800">
                      {{ $comment->user->name }}
                    </span>
                    <span
                      class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                  </div>

                  <div class="comment-text ml-5">
                    {{ $comment->comment }}
                  </div>
                  <!-- /.comment-text -->
                </div>
              @endforeach
            </div>
            <form action="/" method="post">
              <div class="row">
                <div class="form-group col-12" data-aos="fade-up">
                  <label for="comment" class="sr-only">Введите комментарий</label>
                  <textarea name="comment" id="comment" class="form-control"
                    placeholder="Введите комментарий" rows="10"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12" data-aos="fade-up">
                  <input type="submit" value="Оставить комментарий"
                    class="btn btn-warning">
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </main>
@endsection

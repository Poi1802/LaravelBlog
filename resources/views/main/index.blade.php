@extends('layouts.main')

@section('content')
  <main class="blog">
    <div class="container">
      <h1 class="edica-page-title" data-aos="fade-up">Жека Блог</h1>
      <section class="featured-posts-section">
        <div class="row">
          @foreach ($postsMain as $post)
            <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
              <div class="blog-post-thumbnail-wrapper">
                <a href="{{ route('main.posts.show', $post->id) }}">
                  <img src="{{ asset('storage/' . $post->preview_img) }}" alt="blog post">
                </a>
              </div>
              <div class="d-flex justify-content-between">
                <a href="" class="blog-post-category">{{ $post->category->name }}</a>
                <div class="likes d-flex">
                  {{ $post->likes->count() }}
                  <form action="{{ route('main.posts.likes.store', $post->id) }}"
                    method="post">
                    @csrf
                    <button class="text-danger border-0 bg-white">
                      @auth
                        <i
                          class="fa{{ Auth::user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                      @endauth
                      @guest
                        <i class="far fa-heart"></i>
                      @endguest
                    </button>
                  </form>
                </div>
              </div>
              <a href="{{ route('main.posts.show', $post->id) }}"
                class="blog-post-permalink">
                <h6 class="blog-post-title">{{ $post->title }}</h6>
              </a>
            </div>
          @endforeach
        </div>
        <div class="mb-5" style="margin-top: -90px">{{ $postsMain->links() }}</div>
      </section>
      <div class="row">
        <div class="col-md-8">
          <section>
            <div class="row blog-post-row">
              @foreach ($postsRandom->take(6) as $post)
                <div class="col-md-6 blog-post" data-aos="fade-up">
                  <div class="blog-post-thumbnail-wrapper">
                    <a href="{{ route('main.posts.show', $post->id) }}">
                      <img src="{{ asset('storage/' . $post->preview_img) }}"
                        alt="blog post">
                    </a>
                  </div>
                  <div class="d-flex justify-content-between">
                    <a href=""
                      class="blog-post-category">{{ $post->category->name }}</a>
                    <div class="likes">
                      <div class="likes d-flex">
                        {{ $post->likes->count() }}
                        <form action="{{ route('main.posts.likes.store', $post->id) }}"
                          method="post">
                          @csrf
                          <button class="text-danger border-0 bg-white">
                            @auth
                              <i
                                class="fa{{ Auth::user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                            @endauth
                            @guest
                              <i class="far fa-heart"></i>
                            @endguest
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <a href="{{ route('main.posts.show', $post->id) }}"
                    class="blog-post-permalink">
                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                  </a>
                </div>
              @endforeach
            </div>
          </section>
        </div>
        <div class="col-md-4 sidebar" data-aos="fade-left">
          <div class="widget widget-post-carousel">
            <h5 class="widget-title">Популярные посты</h5>
            <div class="post-carousel">
              <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselId" data-slide-to="1"></li>
                  <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  @foreach ($postsPopular as $idx => $post)
                    <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                      <a href="{{ route('main.posts.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->preview_img) }}"
                          alt="First slide">
                      </a>
                      <figcaption class="post-title">
                        <a
                          href="{{ route('main.posts.show', $post->id) }}">{{ $post->title }}</a>
                      </figcaption>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="widget">
            <h5 class="widget-title">Categories</h5>
            <img src="assets/images/blog_widget_categories.jpg" alt="categories"
              class="w-100">
          </div> --}}
        </div>
      </div>
    </div>

  </main>
@endsection

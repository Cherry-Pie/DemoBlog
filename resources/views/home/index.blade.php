@extends('layouts.main')

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            @foreach ($recentPosts->chunk(3) as $posts)
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img" href="{{ route('post', ['category' => $post->category->id, 'post' => $post->id]) }}"><img src="{{ $post->preview->croppedOrOriginalSourceUrl() }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="{{ route('category', ['category' => $post->category->id]) }}">{{ $post->category->title }}</a>
                                        <span class="post-date">{{ $post->published_at->format('j M Y') }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post', ['category' => $post->category->id, 'post' => $post->id]) }}">{{ $post->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@extends('layouts.layout')

@section('content')
        <div class="s-content">

            <div class="masonry-wrap">
                    @if(isset($title_filter))
                        <div style="text-align: center">
                            <h2 class="entry__title">{{$title_filter}}</h2>
                        </div>
                    @endif
                <div class="masonry">

                    <div class="grid-sizer"></div>

                    @foreach ($posts as $post)

                        <article class="masonry__brick entry format-standard animate-this">
                            <div class="entry__thumb">
                                @if($post->photos->count() > 0)
                                    <a href="{{route('posts.show', $post)}}" class="entry__thumb-link">
                                        <img src="{{ $post->photos->first()->url}}" class="image-responsive">
                                    </a>
                                @elseif($post->iframe)

                                    {!!$post->iframe !!}
                                @else
                                    <a href="{{route('posts.show', $post)}}" class="entry__thumb-link">
                                        <img src="https://blog.dev/images/thumbs/masonry/woodcraft-600.jpg"
                                            srcset="https://blog.dev/images/thumbs/masonry/woodcraft-600.jpg 1x, images/thumbs/masonry/woodcraft-1200.jpg 2x" alt="">
                                    </a>
                                @endif

                            </div>

                            <div class="entry__text">
                                <div class="entry__header">
                                    <h2 class="entry__title"><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h2>
                                        <div class="entry__meta">
                                            <span class="entry__meta-cat">
                                            <a href="{{route('categories.show', $post->category)}}">{{$post->category->name}}</a>
                                            </span>
                                            <span class="entry__meta-date">
                                            <a href="{{route('posts.show', $post)}}">{{$post->published_at->format('M d')}}</a>
                                            </span>
                                            <p class="entry__tags">
                                                {{-- <span>Etiquetas</span> --}}
                                                <span class="entry__tag-list">
                                                   @foreach($post->tags as $tag)
                                                        <a href="{{route('tags.show', $tag)}}">{{$tag->name}}</a>
                                                   @endforeach
                                                </span>
                                            </p>
                                        </div>
                                </div>
                                <div class="entry__excerpt">
                                <p>{{$post->excerpt}}</p>
                                </div>
                            </div>

                        </article> <!-- end article -->

                    @endforeach

                </div> <!-- end masonry -->

            </div> <!-- end masonry-wrap -->

            {{$posts->links()}}



        </div> <!-- end s-content -->

@endsection

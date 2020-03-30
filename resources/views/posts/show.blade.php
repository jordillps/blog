@extends('layouts.layout')

@push('styles')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
@endpush

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)



@section('content')

    <!-- site content
        ================================================== -->
        <div class="s-content content">
            <main class="row content__page">

                <article class="column large-full entry format-standard">

                    <div class="media-wrap entry__media">
                        <div class="entry__post-thumb">
                            @if($post->photos->count() > 0)
                                <img src="{{ $post->photos->first()->url}}" class="image-responsive">
                            @elseif($post->iframe)
                                {!!$post->iframe !!}
                            @else
                            <img src="/images/thumbs/single/standard/standard-1000.jpg"
                            srcset="/images/thumbs/single/standard/standard-2000.jpg 2000w,
                                    /images/thumbs/single/standard/standard-1000.jpg 1000w,
                                    /images/thumbs/single/standard/standard-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                            @endif

                        </div>
                    </div>

                    <div class="content__page-header entry__header">
                        <h1 class="display-1 entry__title">
                            {{$post->title}}
                        </h1>
                        <ul class="entry__header-meta">
                            <li class="author">By <a href="#0">{{$post->owner->name}}</a></li>
                        <li class="date">{{ optional($post->published_at)->format('M d')}}</li>
                        @if($post->category)
                            <li class="cat-links">
                                <a href="#0">{{$post->category->name}}</a>
                            </li>
                        @endif
                        </ul>
                    </div> <!-- end entry__header -->

                    <div class="entry__content">

                        <p class="lead drop-cap">
                        {{$post->excerpt}}
                        </p>


                        <p>
                            @if($post->photos->count() > 1)
                                @foreach ($post->photos->take(1-4) as $photo)
                                    <img src="{{ url($photo->url)}}" class="image-responsive">
                                @endforeach
                                {{-- @include('posts.carousel') --}}
                            @else
                                <img src="/images/wheel-1000.jpg"
                                    srcset="/images/wheel-2000.jpg 2000w,
                                            /images/wheel-1000.jpg 1000w,
                                            /images/wheel-500.jpg 500w"
                                            sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                            @endif
                        </p>

                        <h2>{{$post->title}}</h2>

                        <p>
                            {!!$post->body!!}
                        </p>

                        <h3>{{$post->title}}</h3>

                        <p>
                            {!!$post->body!!}
                        </p>

                            <pre><code>
                                code {
                                    font-size: 1.4rem;
                                    margin: 0 .2rem;
                                    padding: .2rem .6rem;
                                    white-space: nowrap;
                                    background: #F1F1F1;
                                    border: 1px solid #E1E1E1;
                                    border-radius: 3px;
                                }
                            </code></pre>

                        <p>
                        Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque
                        corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                        similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
                        venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim
                        cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing
                        in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
                        </p>

                        <ul>
                            <li>Donec nulla non metus auctor fringilla.
                                <ul>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                </ul>
                            </li>
                            <li>Donec nulla non metus auctor fringilla.</li>
                            <li>Donec nulla non metus auctor fringilla.</li>
                        </ul>



                        <p class="entry__tags">
                            <span>Etiquetas</span>

                            <span class="entry__tag-list">
                               @foreach($post->tags as $tag)
                                    <a href="#0">{{$tag->name}}</a>
                               @endforeach
                            </span>

                        </p>

                        {{-- social links --}}

                        <ul class="header__social">
                            <li class="ss-facebook">
                            <a href="https://www.facebook.com/sharer.php?u={{Request::fullUrl()}}&title={{$post->title}}">
                                    <span class="screen-reader-text">Facebook</span>
                                </a>
                            </li>
                            <li class="ss-twitter">
                            <a href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text={{$post->title}}&via={{config('app.name')}}&hashtags={{config('app.name')}}">
                                    <span class="screen-reader-text">Twitter</span>
                                </a>
                            </li>
                            <li class="ss-pinterest">
                                <a href="http://pinterest.com/pin/create/link/?url={{Request::fullUrl()}}">
                                    <span class="screen-reader-text">Behance</span>
                                </a>
                            </li>
                        </ul>

                        {{-- end social links --}}

                    </div> <!-- end entry content -->

                    <div class="entry__pagenav">
                        <div class="entry__nav">
                            <div class="entry__prev">
                                <a href="#0" rel="prev">
                                    <span>Previous Post</span>
                                    Tips on Minimalist Design
                                </a>
                            </div>
                            <div class="entry__next">
                                <a href="#0" rel="next">
                                    <span>Next Post</span>
                                    Less Is More
                                </a>
                            </div>
                        </div>
                    </div> <!-- end entry__pagenav -->

                    <div class="entry__related">
                        <h3 class="h2">Related Articles</h3>

                        <ul class="related">
                            <li class="related__item">
                                <a href="single-standard.html" class="related__link">
                                    <img src="/images/thumbs/masonry/walk-600.jpg" alt="">
                                </a>
                                <h5 class="related__post-title">Using Repetition and Patterns in Photography.</h5>
                            </li>
                            <li class="related__item">
                                <a href="single-standard.html" class="related__link">
                                    <img src="/images/thumbs/masonry/dew-600.jpg" alt="">
                                </a>
                                <h5 class="related__post-title">Health Benefits Of Morning Dew.</h5>
                            </li>
                            <li class="related__item">
                                <a href="single-standard.html" class="related__link">
                                    <img src="/images/thumbs/masonry/rucksack-600.jpg" alt="">
                                </a>
                                <h5 class="related__post-title">The Art Of Visual Storytelling.</h5>
                            </li>
                        </ul>
                    </div> <!-- end entry related -->

                </article> <!-- end column large-full entry-->


                <div class="comments-wrap">
                    @if($post->comments->count() > 0)
                        <div id="comments" class="column large-12">

                                <h3 class="h2">{{$post->comments->count()}} comments</h3>

                            <!-- START commentlist -->
                            @foreach ($post->comments as $comment)

                            <ol class="commentlist">

                                <li class="thread-alt depth-1 comment">

                                    <div class="comment__avatar">
                                        <img class="avatar" src="/images/avatars/user-04.jpg" alt="" width="50" height="50">
                                    </div>

                                    <div class="comment__content">

                                        <div class="comment__info">
                                            <div class="comment__author">{{$comment->author}}</div>

                                            <div class="comment__meta">
                                                <div class="comment__time">{{$comment->created_at->format('M d, Y')}}</div>
                                                {{-- <div class="comment__reply">
                                                    <a class="comment-reply-link" href="#0">Reply</a>
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="comment__text">
                                        <p>{{$comment->body}}</p>
                                        </div>

                                    </div>

                                    @if($comment->reply != null)
                                        <ul class="children">

                                            <li class="depth-2 comment">

                                                <div class="comment__avatar">
                                                    <img class="avatar" src="/images/avatars/user-03.jpg" alt="" width="50" height="50">
                                                </div>

                                                <div class="comment__content">

                                                    <div class="comment__info">
                                                        <div class="comment__author">Replied by the author</div>

                                                        <div class="comment__meta">
                                                            <div class="comment__time">{{$comment->reply->created_at->format('d M Y')}}</div>
                                                            {{-- <div class="comment__reply">
                                                                <a class="comment-reply-link" href="#0">Reply</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>

                                                    <div class="comment__text">
                                                        <p>{{$comment->reply->body}}</p>
                                                    </div>

                                                </div>

                                            </li>

                                        </ul>
                                    @endif

                                </li> <!-- end comment level 1 -->


                            </ol>
                            <!-- END commentlist -->
                            @endforeach

                        </div> <!-- end comments -->
                    @endif

                    <div class="column large-12 comment-respond">

                        <!-- START respond -->
                        <div id="respond">

                            <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                            <form name="contactForm" id="contactForm" action="{{route('comments.store', $post)}}" method="POST" autocomplete="off">
                                <fieldset>
                                    {{ csrf_field() }}

                                    <div class="form-field" {{ $errors->has('author')? 'has error': ''}}>
                                        <input type="text" name="author" class="full-width" placeholder="Your Name" id="InputAuthor" value="{{old('author')}}">
                                        {!! $errors->first('author', '<span class="help-block" style="color:red;">:message</span>')!!}
                                    </div>

                                    <div class="form-field" {{ $errors->has('author_email')? 'has error': ''}}>
                                        <input type="text" name="author_email" class="full-width" placeholder="Your Email" id="InputAuthorEmail" value="{{old('author_email')}}">
                                        {!! $errors->first('author_email', '<span class="help-block" style="color:red;">:message</span>')!!}
                                    </div>

                                    <div class="form-field" {{ $errors->has('body')? 'has error': ''}}>
                                        <textarea name="body" class="full-width" placeholder="Your Text">{{old('body')}}</textarea>
                                        {!! $errors->first('body', '<span class="help-block" style="color:red;">:message</span>')!!}
                                    </div>

                                    <button type="submit" class="btn btn--primary btn-wide btn--large full-width">Add comment</button>

                                </fieldset>
                            </form><!-- end form -->

                        </div>
                        <!-- END respond-->

                    </div> <!-- end comment-respond -->

                </div> <!-- end comments-wrap -->
            </main>

        </div> <!-- end s-content -->

@endsection

@push('scripts')

        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

@endpush

<nav class="header__nav-wrap">

    <ul class="header__nav">
    <li class="{{ Request::routeIs('pages.home') ? 'current' : ''}}"><a href="{{route('pages.home')}}" title="">Home</a></li>
            <li class="has-children">
                <a href="#0" title="">Categories</a>
                <ul class="sub-menu">
                    @foreach ($categories as $category)
                        <li><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></li>
                        {{-- <li><a href="#">{{$category->name}}</a></li> --}}
                    @endforeach
                </ul>
            </li>
            <li class="has-children">
                <a href="#0" title="">Tags</a>
                <ul class="sub-menu">
                    @foreach ($tags as $tag )
                        <li><a href="{{route('tags.show', $tag)}}">{{$tag->name}}</a></li>
                     {{-- <li><a href="#">{{$tag->name}}</a></li> --}}
                    @endforeach
                </ul>
            </li>
        <li><a href="{{route('login')}}" title="">Login</a></li>
        <li class="{{ Request::routeIs('pages.about') ? 'current' : ''}}"><a href="{{route('pages.about')}}" title="">About</a></li>
        <li class="{{ Request::routeIs('pages.contact') ? 'current' : ''}}"><a href="{{route('pages.contact')}}" title="">Contact</a></li>
        {{-- <li class="{{ Request::routeIs('pages.archive') ? 'current' : ''}}"><a href="{{route('pages.archive')}}" title="">Archive</a></li> --}}
    </ul> <!-- end header__nav -->

</nav> <!-- end header__nav-wrap -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class=" nav navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="{{Request::is('/') ? "active" : ""}}">
                <a class="nav-link " href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="{{Request::is('about') ? "active" : ""}}">
                <a class="nav-link " href="{{route('about')}}">About</a>
            </li>
            <li class="{{Request::is('contact') ? "active" : ""}}">
                <a class="nav-link" href="{{url('contact')}}" tabindex="-1">Contact</a>
            </li>
            @guest
            @else
                <li class="{{Request::is('posts.index') ? "active" : ""}}">
                    <a class="nav-link" href="{{route('posts.index')}}" tabindex="-1">Posts</a>
                </li>
                <li class="{{Request::is('categories.index') ? "active" : ""}}">
                    <a class="nav-link" href="{{route('categories.index')}}" tabindex="-1">Categories</a>
                </li>
            @endguest
        </ul>

        {{--        <form class="form-inline my-2 my-lg-0">--}}
        {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search">--}}
        {{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--        </form>--}}
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                {{--                @if (Route::has('register'))--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                {{--                @endif--}}
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                       role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        Hello {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">
                            {{ __('Posts') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('categories.index') }}">
                            {{ __('Categories') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('tags.index') }}">
                            {{ __('Tags') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>

                </li>
            @endguest
        </ul>

    </div>
</nav>


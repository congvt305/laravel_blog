<!doctype html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>

@include('partials._nav')


<div class="container" style="margin-top: 50px;">
    @include('partials._messages')
    <div style="margin-top: 25px; margin-bottom: 25px;">
    @yield('content')
    </div>
    @include('partials.footer')
</div>


@include('partials._javascript')

@yield('scripts')

</body>
</html>

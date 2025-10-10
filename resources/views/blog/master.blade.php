<!DOCTYPE html>
<html lang="en">

@include('blog.partials.head')

<body>
    @include('blog.partials.header')

    @yield('content')

    @include('blog.partials.footer')

    @include('blog.partials.scripts')
</body>

</html>

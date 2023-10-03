<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.header')
</head>
@include('css.template_css')
<body>
    @include('includes.navbar')

    <div class="container">
        @yield('content')
    </div>


    <footer>
        @include('includes.footer')
    </footer>

</body>
</html>

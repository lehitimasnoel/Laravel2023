<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Customer Elites</title>
    <link rel="stylesheet" href="{!! asset('assets/dist/css/bootstrap.min.css') !!}">
    @include('css.welcome_css')
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">


<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>

      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href=" {{ route('login') }}">Login</a>
        <a class="nav-link fw-bold py-1 px-0" href="{{ route('registration') }}">Register</a>

      </nav>
    </div>
  </header>

  <main class="px-3">
    <h1>This Page is for the customer rankings</h1>
    <p class="lead">The most purchaser will be rewarded</p>
    <p class="lead">
      <a href= "{{ route('registration') }}" class="btn btn-lg btn-light fw-bold border-white bg-white">Register Now!</a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">

  </footer>
</div>


</body>
</html>

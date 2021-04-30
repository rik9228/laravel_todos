<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </link>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
  <div class="container">
    @yield('content')
    @yield('footer')
  </div>
</body>

</html>

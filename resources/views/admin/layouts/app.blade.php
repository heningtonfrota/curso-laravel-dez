<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>@yield('title') - {{ config('app.name') }}</title>
</head>
<body>
    <section class="container px-4 mx-auto">
        <div class="sm:flex sm:items-center sm:justify-between">
            @yield('headers')
        </div>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            #deafult footer
        </footer>
    </section>
</body>
</html>

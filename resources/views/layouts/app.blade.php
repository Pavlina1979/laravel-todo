<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Document</title>
  @yield('styles')
</head>

<body>
  <main class="container mx-auto my-10 max-w-lg">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <h1 class="text-3xl mb-6">@yield('title')</h1>
    @yield('content')
  </main>
</body>

</html>
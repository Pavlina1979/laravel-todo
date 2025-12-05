<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <title>Document</title>
  <style type="text/tailwindcss">
    label {
      @apply block uppercase text-slate-700 mb-2
    }

    input[type="text"], input[type="date"], textarea {
      @apply shadow-sm appearance-none border  w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }
    .error {
      @apply text-red-500 text-sm mt-1
    }
  </style>
  @yield('styles')
</head>

<body>
  <main class="container mx-auto my-10 max-w-lg">
    @if (session('success'))
      <div x-data="{ flash: true }">
        <div x-show="flash"
          class="mb-10 relative rounded border border-green-400 bg-green-50 px-4 py-3 text-lg text-green-900"
          role="alert">
          <!-- {{ session('success') }} -->
          <div x-show="flash">
            <strong class="text-bold">Success</strong>
            <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
          </div>
        </div>
      </div>
    @endif
    <h1 class="text-3xl mb-6">@yield('title')</h1>

    @yield('content')
  </main>
</body>

</html>
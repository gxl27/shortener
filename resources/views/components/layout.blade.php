<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="/css/app.css" rel="stylesheet">
  <title>Shortener | Link your business</title>
</head>
<body>

  {{-- upscreen arrow --}}
  @include('partials._upscreen')

  {{-- navbar --}}
  <x-navbar />
  
  <main class='container'>
    {{$slot}}
  </main>

  {{-- footer --}}
  @include('partials._footer')

  <x-flash-message />

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>
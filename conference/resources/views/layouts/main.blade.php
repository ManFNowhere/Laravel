<!doctype html>
<html class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
  <title>Conference | {{ $title }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  @include('partials.font')
</head>
<body class="bg-slate-900">
    @if (session()->has('subscribed'))
      @include('partials.subscribeModal')
    @endif
    @include('partials.navbar')
   
    <div class=" mx-auto ">
    @yield('container')
    </div>


    <script>
      const hideModalButtons = document.querySelectorAll('#model-hide, #model-hide1');
      hideModalButtons.forEach(button => button.addEventListener('click', () => {
        document.getElementById('subscribe-model').style.display = 'none';
      }));
    </script>
</body>
</html>

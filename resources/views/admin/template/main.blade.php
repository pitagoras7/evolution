  <!DOCTYPE html>
  <html lang="{{ app()->getLocale() }}">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Import Google Icon Font-->
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/init.css') }}"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
     @include('admin.partial.nav')
   <div class="container">

    <div class="section">


      <section>
        @yield('content')
      </section>

      @yield('modalNew')
      @yield('modalEdit')
     

    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/vue/vue.min.js') }}"></script>
  @yield('javascriptFile')

<script>
@yield('javascriptCode')
</script>



<script type="text/javascript" src="{{ asset('js/task.js') }}"></script>


</body>
</html>
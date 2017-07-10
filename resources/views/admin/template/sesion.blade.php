  <!DOCTYPE html>
  <html>
  <head>
    <!--Import Google Icon Font-->
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/init.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
   <div class="container">

    <div class="section " style="text-align: center">




      <div style="  
    width: 400px;
    text-align: center;
    margin: auto;
    margin-top: 100px;
    height: 300px;">
        @yield('content')
      </div>



    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/vue/vue.min.js') }}"></script>


<script>
@yield('javascriptCode')
</script>


</body>
</html>
  <!DOCTYPE html>
  <html>
  <head>
    <!--Import Google Icon Font-->
    <link href="<?php echo e(asset('css/icon.css')); ?>" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/materialize/css/materialize.min.css')); ?>"  media="screen,projection"/>

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
        <?php echo $__env->yieldContent('content'); ?>
      </div>



    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="<?php echo e(asset('plugins/jquery/jquery-2.1.1.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('plugins/materialize/js/materialize.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('plugins/vue/vue.min.js')); ?>"></script>


<script>
<?php echo $__env->yieldContent('javascriptCode'); ?>
</script>


</body>
</html>
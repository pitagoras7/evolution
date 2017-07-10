  <!DOCTYPE html>
  <html lang="<?php echo e(app()->getLocale()); ?>">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--Import Google Icon Font-->
    <link href="<?php echo e(asset('css/icon.css')); ?>" rel="stylesheet">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/materialize/css/materialize.min.css')); ?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/materialize/css/init.css')); ?>"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
     <?php echo $__env->make('admin.partial.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="container">

    <div class="section">


      <section>
        <?php echo $__env->yieldContent('content'); ?>
      </section>

      <?php echo $__env->yieldContent('modalNew'); ?>
      <?php echo $__env->yieldContent('modalEdit'); ?>
     

    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="<?php echo e(asset('plugins/jquery/jquery-2.1.1.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('plugins/materialize/js/materialize.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('plugins/vue/vue.min.js')); ?>"></script>
  <?php echo $__env->yieldContent('javascriptFile'); ?>

<script>
<?php echo $__env->yieldContent('javascriptCode'); ?>
</script>



<script type="text/javascript" src="<?php echo e(asset('js/task.js')); ?>"></script>


</body>
</html>
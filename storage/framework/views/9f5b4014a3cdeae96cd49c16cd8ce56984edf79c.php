<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="row">
        <div class="col m12 s12">
            <div class="panel panel-default">
               

                <div class="panel-body">
                   <h4> You are logged in! </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
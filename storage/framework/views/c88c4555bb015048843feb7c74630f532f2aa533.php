<?php $__env->startSection('content'); ?> 

<div class="row" >
	<h4> Iniciar Sesion </h4>
</div>
<div class="row">
	<form id="formLogin" class="col s12">
		<?php echo e(Form::token()); ?>

		<div class="row">
			<div class="input-field col m12 s12">
				<i class="material-icons prefix">account_circle</i>
				<input name="email" id="icon_prefix" type="text" class="validate">
				<label for="icon_prefix">Email</label>
			</div>
			<div class="input-field col  m12 s12">
				<i class="material-icons prefix">phone</i>
				<input  name="password"   id="icon_telephone" type="password" class="validate">
				<label for="icon_telephone">Password</label>
			</div>

			<div class="input-field col  m12 s12" >
				<a onclick="login()" style="width:50%" class="waves-effect waves-light btn">Log in</a>
			</div>

		</div>
	</form>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascriptCode'); ?> 





function login(){
	

			     $.ajax({
					  method: "POST",
					  url: "admin/login",
					  data:$("#formLogin").serialize()
					})
				  .done(function( msg ) {


					 console.log(msg);
				     

				  });

}


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template.sesion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
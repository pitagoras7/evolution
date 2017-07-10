<?php $__env->startSection('content'); ?> 


<div class="section">

	<a class="waves-effect waves-light btn" href="#modal1">New User</a>


</div>

<div id="app">
	<table class="striped responsive-table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Emails</th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($user->name); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td style="width:20%">

					<a  v-on:click="deletedUser(<?php echo e($user->id); ?>)" href="#" class="waves-effect waves-light btn"><i class="material-icons ">delete</i></a>
					<a  v-on:click="reverseMessage(<?php echo e($user->id); ?>)" href="#" class="waves-effect waves-light btn"><i class="material-icons ">edit</i></a>

				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>


	</table>

	<div id="modal2" class="modal ">
		<form id="formEdit"  method="POST"  accept-charset="UTF-8">
			<input name="_method" type="hidden" value="PUT">
			<?php echo e(Form::token()); ?>

			<div class="modal-content">
				<h4>Editar Usuario</h4>
				<div class="row">
					<div class="input-field col m6 s12">
						<input  placeholder=""  name="name" id="name" type="text" class="validate">
						<label for="name">Name</label>
					</div>

					<div class="input-field col m6 s12">
						<input placeholder="" name="email" id="email" type="email" class="validate">
						<label for="email">Email</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn waves-effect waves-light" type="submit" name="action">{{ message }}
					<i class="material-icons right">send</i>
				</button>
			</div>
			<?php echo Form::close(); ?>

		</div>

		<div id="modal3" class="modal ">
			<form id="formDeleted"  method="POST"  accept-charset="UTF-8">
				<input name="_method" type="hidden" value="DELETE">
				<?php echo e(Form::token()); ?>

				<div class="modal-content">
					<h4>Eliminar Uuario</h4>
				</div>
				<div class="modal-footer">
					<button class="btn waves-effect waves-light" type="submit" name="action"> Yes
						<i class="material-icons right">send</i>
					</button>

					<button type="button" onclick="this.modal('close')" class="btn waves-effect waves-light"  v-on:click="deletedUserNot" > No
					<i class="material-icons left">send</i>
					</button>

				</div>
				<?php echo Form::close(); ?>

			</div>

		</div>
		<?php $__env->stopSection(); ?>

		<?php $__env->startSection('modalEdit'); ?> 



		<?php $__env->stopSection(); ?>

		<?php $__env->startSection('modalNew'); ?> 
		<?php echo $__env->make('admin.user.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $__env->stopSection(); ?>


		<?php $__env->startSection('javascriptCode'); ?> 


		$(document).ready(function(){
		$('.modal').modal();
	});


	var app = new Vue({

	el: '#app',
	data: {
	message: 'Hello Vue!'
},methods: {

		reverseMessage: function (id) {
		$('#modal2').modal('open');
		$.getJSON( "http://127.0.0.1:8000/admin/users/"+id+"/edit", function( resultado ) {
		$('#formEdit').attr("action", "users/"+id);
		$("#email").val(resultado.email);
		$("#name").val(resultado.name);
		})

		} ,
		
		deletedUser: function (id) {
		$('#modal3').modal('open');
		$('#formDeleted').attr("action", "users/"+id);
		},
		
		deletedUserNot: function () {
		$('#modal3').modal('close');
		}



}


})



function hola(id){
}




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
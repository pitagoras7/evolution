







<div id="modal2" class="modal ">

	<?php echo Form::open(['route'=>['users.update',$user],$user,'method'=>'PUT' ]); ?>


	<div class="modal-content">
		<h4>Editar Usuario</h4>


		<div class="row">
			<div class="input-field col m6 s12">
				<input name="name" id="name" type="text" class="validate">
				<label for="name">Name</label>
			</div>

			<div class="input-field col m6 s12">
				<input name="email" id="email" type="email" class="validate">
				<label for="email">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col  m6 s12">
				<input name="password" id="password" type="password" class="validate">
				<label for="password">Password</label>
			</div>

			<div class="input-field col  m6 s12">
				<input name="passwordconfirm"  id="passwordconfirm" type="password" class="validate">
				<label for="passwordconfirm">Password</label>
			</div>
		</div>





	</div>
	<div class="modal-footer">



		<button class="btn waves-effect waves-light" type="submit" name="action">SAVE INFORMATION
			<i class="material-icons right">send</i>
		</button>


	</div>


	<?php echo Form::close(); ?>


</div>

































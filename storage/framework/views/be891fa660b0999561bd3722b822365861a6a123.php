

<div id="modal1" class="modal " style="">

	<?php echo Form::open(['route'=>'tasks.store','method'=>'POST' ]); ?>



	<div class="modal-content">
		<h4> <i class='small material-icons' style="font-size:1.2em" >note_add</i> New Task</h4>


		<div class="row">
			<div class="input-field col m12 s12">
				<input name="name" id="name" type="text" class="validate">
				<label for="name">Name</label>
			</div>

		
			  <div class="input-field col m6 s12">
			    <select name="priority" id="priority">
			      <option value="normal" disabled selected>Priority</option>
			      <option value="normal">Normal</option>
			      <option value="high">High</option>
			    </select>
			    <label>Priority Select</label>
			  </div>

			  <div class="input-field col m6 s12">
				<input id="expiration_at"  name="expiration_at" type="date" class="datepicker">
			    <label>Expiration At</label>
			  </div>


		</div>





	</div>
	<div class="modal-footer" style="padding-right:50px">
		<button  style="    position: relative;
    top: -30px; "v-on:click="createdTask" class="btn-large waves-effect waves-light green darken-4" type="button" name="action">SAVE 
			<i class="material-icons right">send</i>
		</button>
	</div>


	<?php echo Form::close(); ?>


</div>

















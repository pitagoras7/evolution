<?php $__env->startSection('content'); ?> 
<div class="section">
   <a data-position="bottom" data-delay="50" data-tooltip="New Task"  class="waves-effect waves-light btn-large green darken-4 tooltipped" href="#modal1"> <i class='small material-icons' style="font-size:1.6em" >note_add</i> </a>
</div>
<div id="app">
   <table class="striped responsive-table">
      <thead>
         <tr>
            <th><i class='small material-icons' style="font-size:1.2em" >assignment</i> Name</th>
            <th><i class='small material-icons' style="font-size:1.2em" >loyalty</i> Priority</th>
            <th><i class='small material-icons' style="font-size:1.2em" >assignment_late</i> Estatu</th>
            <th><i class='small material-icons' style="font-size:1.2em" >alarm_on</i> Expiration At</th>
            <th></th>
         </tr>
      </thead>
      <tbody  class="bodyTable" >
         <tr>
         </tr>
      </tbody>
   </table>
   <div id="modal2" class="modal ">
      <form id="formEdit"  method="POST"  accept-charset="UTF-8">
      <input name="_method" type="hidden" value="PUT">
      <input name="id" id="id" type="hidden" >
      <?php echo e(Form::token()); ?>

      <div class="modal-content">
         <h4> Edit task </h4>
         <div class="row">
            <div class="input-field col m12 s12">
               <input placeholder="" name="name" id="name" type="text" class="validate">
               <label for="name">Name</label>
            </div>
            <div class="input-field col m6 s12">
               <select name="priority" id="priority"  >
                  <option value="normal">Normal -</option>
                  <option value="high">High</option>
               </select>
               <label >Priority </label>
            </div>
            <div class="input-field col m6 s12">
               <select name="estatus" id="estatus">
                  <option value="waiting">Waiting</option>
                  <option value="completed">Completed</option>
               </select>
               <label>Estatus</label>
            </div>
            <div class="input-field col m12 s12">
               <input  placeholder="" name="expiration_at" id="expiration_at" type="date" class="datepicker">
               <label>Expiration At</label>
            </div>
         </div>
      </div>
      <div class="modal-footer">
         <button v-on:click="updateTask()"   class="btn-large waves-effect waves-light green darken-4" type="button" name="action"> Update 
         <i class="material-icons right">send</i>
         </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <?php echo Form::close(); ?>

   </div>
   <div id="modal3" class="modal ">
      <form id="formDeleted"  method="POST"  accept-charset="UTF-8">
      <input name="_method" type="hidden" value="DELETE">
      <input name="id" id="id" type="hidden" >
      <?php echo e(Form::token()); ?>

      <div class="modal-content">
         <h4><i class='material-icons' style="font-size:1em" >error</i>  
            Are you sure you want to delete this task? 
         </h4>
         <h5> </h5>
      </div>
      <div class="modal-footer">
         <button  v-on:click="deletedTask()" class="btn-large waves-effect waves-light green darken-4" type="button" name="action"> Yes
         <i class='small material-icons' >done</i>
         </button>
         <button type="button" onclick="this.modal('close')" class="btn-large waves-effect waves-light"  v-on:click="deletedUserNot" > No
         <i class='small material-icons' >mode_edit</i>
         </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <?php echo Form::close(); ?>

   </div>
   <div id="modal4" class="modal ">
      <div class="modal-content">
         <h4>Tasks to finish</h4>
         <table class="striped responsive-table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Expiration at</th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($notificacion->name); ?></td>
                  <td>Expires in <?php echo e($notificacion->dif); ?>  days </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
      <div class="modal-footer">
      </div>
   </div>
   <?php echo $__env->make('task.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

		<?php $__env->stopSection(); ?>


<!---- CODE JAVASCRIPT  ------>



<?php $__env->startSection('javascriptCode'); ?> 


	$(document).ready(function(){
		$('.modal').modal();
		$('select').material_select();
      $('.tooltipped').tooltip({delay: 50});
		refreshTable();
		 notification();

		 $('.datepicker').pickadate({
		    	selectMonths: false, 
		        format: 'yyyy-mm-dd',
    			min: 0
		 });

	});


	var app = new Vue({

		el: '#app',
		data: {
			message: 'Hello Vue!'
		},methods: {

		reverseMessage: function (id) {
			$('#modal2').modal('open');
			$.getJSON( "admin/users/"+id+"/edit", function( resultado ) {
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
		},
		
		createdTask: function () {

				var today             = new Date();
				var dateForm = new Date($("#modal1 #expiration_at").val());
				today.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

				if (today <= dateForm) {

				$.ajax({
					  method: "GET",
					  url: "task/externo",
					  dataType:"json",
					  data: { 
					   name: $("#modal1 #name").val(),
					   priority: $("#modal1 #priority").val(),
					   expiration_at: $("#modal1 #expiration_at").val(),
					   user_id:"10" 
					   }
					})
				  .done(function( msg ) {
				   
				  	console.log(msg);

				     if(msg==true){
					 $('#modal1').modal('close');
		  		     Materialize.toast('Task Created!', 4000);
				     }
				   
					refreshTable();
				  });

				}
				else {
 						Materialize.toast("Please check the expiration date", 4000);
				}

		},updateTask: function (id) {

				var today             = new Date();
				var dateForm = new Date($("#modal2 #expiration_at").val());
				today.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

				if (today <= dateForm) {

					$.ajax({
					  method: "POST",
					  url: "admin/tasks/"+$("#id ").val(),
					  data:$("#formEdit").serialize()
					})
				  .done(function( msg ) {

					 $('#modal2').modal('close');
		  		     Materialize.toast('Edition completed!', 4000);
					  refreshTable();
				  });


				}else {
 						Materialize.toast("Please check the expiration date", 4000);
				}



		},deletedTask: function () {

					$.ajax({
					  method: "DELETE",
					  url: "admin/tasks/"+$("#modal3 #id").val(),
					  data:$("#formEdit").serialize()
					})
				  .done(function( msg ) {
					 $('#modal3').modal('close');
		  		     Materialize.toast('Completed elimination!', 4000);
					 refreshTable();
				  });
		}
		
	} /* methods */


	}); /* vue */


function refreshTable(){

  					$(".bodyTable tr").remove();
				    $.getJSON( "/task/list", function( result ) {
					$.each(result,function(i,n){
     					$(".bodyTable").append("<tr><td>"+n.name+"</td><td>"+n.priority+"</td><td>"+n.estatus+"</td><td>Expires in "+n.dif+" days</td><td><a onclick='editTask("+n.id+")' href='#' class='waves-effect waves-light btn green darken-4 tooltipped' data-position='bottom' data-delay='50' data-tooltip='edit Task'><i class='small material-icons' >mode_edit</i></a>&nbsp;<a href='#' onclick='deletedTask("+n.id+")' class='waves-effect waves-light btn'><i class='small material-icons' >delete</i></a></td></tr>");
					    });
					});
}


//Early warning
function notification(){
if(<?php echo e(count($notifications)); ?> > 0){
		$('#modal4').modal('open');
}
}





function editTask(id){
		$('#modal2').modal('open');
		$.getJSON( "/admin/tasks/"+id+"/edit", function( resultado ) {
		$('#formEdit').attr("action", "");

		/* Edicion material selected */
		$("#modal2 #priority  [value='"+resultado.priority+"']").remove();
		$("#modal2 #priority").append("<option value="+resultado.priority+" selected>"+resultado.priority+"</option>");
		$('#modal2 #priority').material_select();
		/* fin edicion material selected */

		/* Edicion material selected */
		$("#modal2 #estatus  [value='"+resultado.estatus+"']").remove();
		$("#modal2 #estatus").append("<option value="+resultado.estatus+" selected>"+resultado.estatus+"</option>");
		$('#modal2 #estatus').material_select();
		/* fin edicion material selected */


		$("#expiration_at").val(resultado.expiration_at);
		$("#name").val(resultado.name);
		$("#id").val(resultado.id);
		});


}



function deletedTask(id){
		$('#modal3').modal('open');
		
      $.getJSON( "/admin/tasks/"+id+"/edit", function( resultado ) {
		$("#modal3 #id").val(resultado.id);
      $("#modal3 h5").text(resultado.name);
      });
} 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
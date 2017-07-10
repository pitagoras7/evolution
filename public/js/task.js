
	$(document).ready(function(){
		$('.modal').modal();
		$('select').material_select();
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


				var hoy             = new Date();
				var fechaFormulario = new Date($("#modal1 #expiration_at").val());
				hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

				if (hoy <= fechaFormulario) {

				 
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


				var hoy             = new Date();
				var fechaFormulario = new Date($("#modal2 #expiration_at").val());
				hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

				if (hoy <= fechaFormulario) {


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
     					$(".bodyTable").append("<tr><td>"+n.name+"</td><td>"+n.priority+"</td><td>"+n.estatus+"</td><td>Expires in "+n.dif+" days</td><td><a onclick='editTask("+n.id+")' href='#' class='waves-effect waves-light btn green darken-4'><i class='small material-icons' >mode_edit</i></a>&nbsp;<a href='#' onclick='deletedTask("+n.id+")' class='waves-effect waves-light btn'><i class='small material-icons' >delete</i></a></td></tr>");
					    });
					});
}


function notification(){



if({{ count($notifications) }} > 0){
	
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
		});


} 

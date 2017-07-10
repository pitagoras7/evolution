@extends('admin.template.sesion')

@section('content') 

<div class="row" >
	<h4> Iniciar Sesion </h4>
</div>
<div class="row">
	<form id="formLogin" class="col s12">
		{{ Form::token() }}
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

@endsection


@section('javascriptCode') 





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


@endsection
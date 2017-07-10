
<nav>
	<div class="nav-wrapper  deep-orange darken-4" style="padding-left:50px; padding-right:50px">
		<a href="#!" class="brand-logo">

<i class="large material-icons" style="font-size: 1.5em;">assignment</i>
Evolution Task 

		</a>
		<ul class="right hide-on-med-and-down">
			@if (Auth::guest())
			<li><a href="{{ route('login') }}">Login</a></li>
			<li><a href="{{ route('register') }}">Register</a></li>
			@else
			<li >
				<a class="dropdown-button" href="#!" data-activates="dropdown1" >
			{{ Auth::user()->name }} <span class="caret"></span>
			 	</a>

			</li>
			@endif

		</ul>
	</div>
</nav>





<ul id="dropdown1" class="dropdown-content">
	<li>
		<a href="{{ route('logout') }}"
		onclick="event.preventDefault();
		document.getElementById('logout-form').submit();">
		Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>
</li>
</ul>       


<nav>
	<div class="nav-wrapper  deep-orange darken-4" style="padding-left:50px; padding-right:50px">
		<a href="#!" class="brand-logo">

<i class="large material-icons" style="font-size: 1.5em;">assignment</i>
Evolution Task 

		</a>
		<ul class="right hide-on-med-and-down">
			<?php if(Auth::guest()): ?>
			<li><a href="<?php echo e(route('login')); ?>">Login</a></li>
			<li><a href="<?php echo e(route('register')); ?>">Register</a></li>
			<?php else: ?>
			<li >
				<a class="dropdown-button" href="#!" data-activates="dropdown1" >
			<?php echo e(Auth::user()->name); ?> <span class="caret"></span>
			 	</a>

			</li>
			<?php endif; ?>

		</ul>
	</div>
</nav>





<ul id="dropdown1" class="dropdown-content">
	<li>
		<a href="<?php echo e(route('logout')); ?>"
		onclick="event.preventDefault();
		document.getElementById('logout-form').submit();">
		Logout
	</a>

	<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
		<?php echo e(csrf_field()); ?>

	</form>
</li>
</ul>       

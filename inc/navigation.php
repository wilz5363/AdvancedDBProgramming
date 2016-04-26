<nav class="navbar navbar-default" role="navigation" style="margin: 0">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Car Rental</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li <?php if($section == 'rent'){echo 'class="active"';}?>><a href="<?php echo BASE_URL.'index.php';?>">RENT</a></li>
			<li <?php if($section == 'car'){echo 'class="active"';}?>><a href="<?php echo BASE_URL.'car.php';?>">CAR</a></li>
            <li <?php if($section == 'customer'){echo 'class="active"';}?>><a href="<?php echo BASE_URL.'customer.php';?>">CUSTOMER</a></li>
            <li <?php if($section == 'car_category'){echo 'class="active"';}?>><a href="<?php echo BASE_URL.'car_category.php';?>">CAR CATALOG</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="staff_profile.php">Profile</a>
			</li>
			<li>
				<a href="signout.php">Sign Out</a>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
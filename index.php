<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="wrapper ">
		<section class="row">
			<div class="col-sm-4 offset-sm-4">
				<?php 
					if(isset($_SESSION['username'])){
						echo "You are logged in " . $_SESSION['username'];
					}else{
						echo   '<h2 class="signup">Signup</h2>
								<form action="includes/signup.php" method="POST">
									<div class="form-group">
									<input type="text" name="firstname" placeholder="First Name" class="form-control">
									<input type="text" name="lastname" placeholder="Last Name" class="form-control">
									<input type="email" name="email" placeholder="E-mail" class="form-control">
									<input type="text" name="username" placeholder="Username" class="form-control">
									<input type="password" name="password" placeholder="Password" class="form-control">
									<button type="submit" name="submit" class="btn btn-danger">Sign Up</button>
									</div>
								</form>';
					}
				 ?>
				
			</div>
		</section>
	</div>


</body>
</html>
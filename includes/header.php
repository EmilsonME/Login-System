<header>
		<nav class="navbar navbar-light bg-light justify-content-between">
			
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>
			</ul>
		
			<?php 
				if (isset($_SESSION['username'])) {
					echo '<form action="includes/logout.php" method="POST">
						<button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">Logout</button>
					</form>';
				} else {
					echo '<form class="form form-inline fl-right my-2 my-lg-0" method="POST" action="includes/login.php">
							<input type="text" name="username" placeholder="Username" class="form-control mr-sm-2">
							<input type="password" name="password" placeholder="Password" class="form-control mr-sm-2">
							<button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">Login</button>
						  </form>';
				}
			?>
			
			
		
		</nav>
</header>
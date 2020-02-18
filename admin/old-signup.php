<?php include "includes/header.php" ?>
<?php session_start(); ?>
<?php include "includes/database.php" ?>
<?php include "includes/navigation.php" ?>

<?php 

	if(isset($_POST['submit'])) {

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$query = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password') ";
		$result = mysqli_query($connection, $query);

		if(!$result) {
			die("Query Failed " . mysqli_error($connection));
		}

		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query) {

			die("Query Failed " . mysqli_error($connection));

		}

		while($row = mysqli_fetch_array($select_user_query)) {

			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_first_name = $row['first_name'];
			$db_last_name = $row['last_name'];

		}

		if($username === $db_username && $password === $db_password) {

			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_password;
			$_SESSION['first_name'] = $db_first_name;
			$_SESSION['last_name'] = $db_last_name;

			header("Location: admin");

		} else {

			header("Location: index.php");

		}	

	}

		


 ?>

<div class="row signup">
	<div class="container">
		<div class="contact-form">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-12">
						<h1 align="center">Sign Up</h1>
						<div class="form-group">
							<label for="first_name">First Name</label></br>
							<input type="text" name="first_name" placeholder="Enter First Name"></br>
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label></br>
							<input type="text" name="last_name" placeholder="Enter Last Name"></br>
						</div>
						<div class="form-group">
							<label for="username">Username</label></br>
							<input type="text" name="username" placeholder="Enter Username"></br>
						</div>
						<div class="form-group">
							<label for="username">Password</label></br>
							<input type="text" name="password" placeholder="Enter Password"></br>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-md btn-main">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include "includes/footer.php" ?>
	


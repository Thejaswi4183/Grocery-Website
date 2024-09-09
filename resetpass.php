<?php include('db_conn.php');
session_start();
ob_start();
$tokenquery= "SELECT token FROM users WHERE id='{$_SESSION["id"]}'";
$query = mysqli_query($conn, $tokenquery);
$userdata = mysqli_fetch_array($query);
$token = $userdata['token'];
$message = $Home = '';
if ($token == " ") {
	header("location:reset.php");
} else {


	if (isset($_POST['submit'])) {



		$password = $_POST['password'];
		$Repassword = $_POST['Repassword'];

		if (empty($password)) {
			$message = "<div class='alert alert-danger'>Password Cannot be Empty..!!</div>";
		} else {
			if ($password !== $Repassword) {
				$message = "<div class='alert alert-danger'>Password Not Match..!!</div>";
			} else {

				$password = md5($password);
				$Repassword = md5($Repassword);
				$query = "UPDATE users SET password = '$password' WHERE token = '$token' ";
				$result = $conn->query($query);
				if ($result) {
					$message = "<div class='alert alert-success'>Reset Your Password Successfully..</div>";
					$Home = "<a href='login.php' class='btn btn-success btn-lg'>Login</a>";
				} else {
					$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reset Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<h1>Reset Password</h1>
</head>

<body>
	<div class="box">
		<form method="post">
			<?php echo $message; ?>

			<!-- <label for="password">Password</label> -->
			<input type="password" name="password" placeholder="Password"><br>
			<!-- <label for="password">Retype Password</label> -->
			<input type="password" name="Repassword" placeholder="Retype Password" required><br>
			<button type="submit" name="submit">Reset Password</button> <?php echo $Home; ?>
		</form>
	</div>
</body>

</html>
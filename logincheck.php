<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	$uname = ($_POST['uname']);
	$pass = ($_POST['password']);
}



if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$admin = validate("admin");
	$adminpass = validate("0192023a7bbd73250516f069df18b500");
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: login.php?error=Password is required");
		exit();
	} else {
		// hashing the password
		$pass = md5($pass);


		$sql = "SELECT * FROM users WHERE user_name ='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['user_name'] === $admin && $row['password'] === $adminpass) {
				$_SESSION['user_name'] = $row['user_name'];
				header("Location: category.php");
				exit();
			} else if ($row['user_name'] === $uname && $row['password'] === $pass) {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: home.php");
				exit();
			} else {
				header("Location: login.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: login.php?error=Incorect User name or password");
			exit();
		}
	}
} else {
	header("Location: login.php");
	exit();
}

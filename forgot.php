<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width , initial-scale=1">
  </head>
<title>forgot password</title>
<h1>Recover Account</h1>

<body>
    <?php
    include "db_conn.php";
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $emailquery = "SELECT *FROM users WHERE email='$email'";
        $query = mysqli_query($conn, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if ($emailcount) {
            $userdata = mysqli_fetch_array($query);
            $username = $userdata['user_name'];
            $token = $userdata['token'];
            $subject = "Password Reset";
            $body = "Hi, $username. Click on this link to reset your password
        http://localhost/Grocery/Main/reset.php?token=$token";
            $sendermail = "From: project4dsi@gmail.com";
            if (mail($email, $subject, $body, $sendermail)) {
                $_SESSION['msg'] = "check your Mail" & $email;
                header('location:login.php?success=Link to Reset Your Password Has been Sent To  Your Mail');
            } else {
                echo "Failed to send Email....";
            }
        } else {
            header("Location:forgot.php?error=Email Required");
        }
    }

    ?>
    <div class="forgot">
        <center>
            <h2>Enter your Email</h2>
            <hr>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <p>
                    <input type="email" name="email" placeholder=" Email">
                </p>
                <input type="submit" name="submit" value="RESET PASSWORD">
            </form>
        </center>
    </div>
</body>

</html>
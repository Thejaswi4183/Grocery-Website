<?php 
session_start();

session_unset();
session_destroy();
// Displaying logout Success and redirecting the page to logoutpage
header("Location: adminlogoutpage.php?error=Logout Success");

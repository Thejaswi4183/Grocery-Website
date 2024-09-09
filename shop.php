<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description"
			content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

		<!-- title -->
		<title>Shop</title>

		<!-- favicon -->
		<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
		<!-- fontawesome -->
		<link rel="stylesheet" href="assets/css/all.min.css">
		<!-- bootstrap -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<!-- owl carousel -->
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<!-- magnific popup -->
		<link rel="stylesheet" href="assets/css/magnific-popup.css">
		<!-- animate css -->
		<link rel="stylesheet" href="assets/css/animate.css">
		<!-- mean menu css -->
		<link rel="stylesheet" href="assets/css/meanmenu.min.css">
		<!-- main style -->
		<link rel="stylesheet" href="assets/css/main.css">
		<!-- responsive -->
		<link rel="stylesheet" href="assets/css/responsive.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<!-- font awesome -->
		<script src="https://kit.fontawesome.com/0469953560.js" crossorigin="anonymous"></script>
	</head>

	<body>

		<!--PreLoader-->
		<div class="loader">
			<div class="loader-inner">
				<div class="circle"></div>
			</div>
		</div>
		<!--PreLoader Ends-->

		<!-- header -->
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="home.php">
									<img src="assets/img/logo.png" alt="">
								</a>
							</div>
							<!-- logo -->

							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li><a href="home.php">Home</a>
									</li>
									<li><a href="about.php">About</a></li>
									<li><a href="#">Pages</a>
										<ul class="sub-menu">
											<li><a href="about.php">About</a></li>
											<li><a href="cart.php">Cart</a></li>
											<li><a href="checkout.php">Check Out</a></li>
											<li><a href="contact.php">Contact</a></li>
											<li><a href="shop.php">Shop</a></li>
										</ul>
									</li>
									<li><a href="contact.php">Contact</a></li>
									<li><a href="shop.php">Shop</a>
										<ul class="sub-menu">
											<li><a href="shop.php">Shop</a></li>
											<li><a href="checkout.php">Check Out</a></li>
											<li><a href="cart.php">Cart</a></li>
										</ul>
									</li>
									<!-- Displaying User name at the top -->
									<li>
										<style>
											a {
												color: inherit;
												font: inherit;
											}

											.login-status {
												padding-left: 22rem;
												font-size: 1.75rem;
												color: #f6831e;
											}

											.login-status a {
												color: #fff;
											}

											.login-status a:hover {
												color: #f6831e;
											}

											.fa-user {
												color: #fff;

											}

											.fa-user:hover {
												color: #f6831e;
											}
										</style>
										<!-- Displaying User name at the top -->
										<div class="login-status">

											<a href="profile.php">

												<i class="fa-solid fa-user">
													<?php echo "<styles>" . $_SESSION['user_name'];
													"</styles>" ?>
												</i>
											</a>
										</div>
									</li>
									<li>
										<!-- Creating icon for logout -->
										<style>
											a {
												color: inherit;
												font: inherit;
											}

											#logout-btn {
												margin-top: 0.6rem;
												font-size: 1.75rem;
											}
										</style>
										<a href="logout.php">
											<div class="fa-solid fa-arrow-right-from-bracket" id="logout-btn"></div>
										</a>
									</li>
								</ul>
							</nav>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<h1>Shop</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
		<section class="shop">
			<div class="container">
				<div class="heading_container heading_center">
					<h2 align="center" style="color:red">
						Our <span>products</span>

					</h2>
				</div>
				<br><br>
				<div class="row">

					<?php
					include('db_conn.php');
					$select_query = "SELECT * from products";
					$result_query = mysqli_query($conn, $select_query);
					while ($row = mysqli_fetch_assoc($result_query)) {
						$product_name = $row['name'];
						$product_image = $row['image'];
						$product_price = $row['price'];
						?>

						<div class="col-sm-6 col-md-4 col-lg-3" styles="height:3rem">
							<div class="box">
								<div class="img-box">
									<img src="./Uploads/<?= $product_image; ?>" width=90px alt="<?= $product_name; ?>">
								</div>
								<div class="detail-box">
									<h5>
										<?= $product_name; ?><br>
									</h5>
									<h6>
										₹
										<?= $product_price; ?>
									</h6>

									<?php
									?>
								</div>
								<div class="option_container">
									<div class="options">
										<button class="add" data-id="<?php echo $row["id"]; ?>">Add to Cart </button>
									</div>
								</div>
							</div>

						</div>
						<?php
					}

					?>



				</div>
			</div>
			<br>
			<?php
			require_once 'db_conn.php';
			$sql_cart = "SELECT * FROM cart";
			$all_cart = $conn->query($sql_cart);
			?>
			<script>
				var product_id = document.getElementsByClassName("add");
				for (var i = 0; i < product_id.length; i++) {
					product_id[i].addEventListener("click", function (event) {
						var target = event.target;
						var id = target.getAttribute("data-id");
						var xml = new XMLHttpRequest();
						xml.onreadystatechange = function () {
							if (this.readyState == 4 && this.status == 200) {
								var data = JSON.parse(this.responseText);
								target.innerHTML = data.in_cart;
								document.getElementById("cart").innerHTML = data.num_cart + 1;
							}

						}
						xml.open("GET", "db_conn.php?id=" + id, true);
						xml.send();
					})
				}
			</script>
			<!-- footer -->
			<div class="footer-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="footer-box about-widget">
								<h2 class="widget-title">About us</h2>
								<p>Plant the seeds of wellness, let veggie power grow...</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="footer-box get-in-touch">
								<h2 class="widget-title">Get in Touch</h2>
								<ul>
									<li>Thigalarpete,Bengaluru-560069</li>
									<li>thigalarpetegopi@gmail.com</li>
									<li>+91 9731859761</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="footer-box pages">
								<h2 class="widget-title">Pages</h2>
								<ul>
									<li><a href="home.php">Home</a></li>
									<li><a href="about.php">About</a></li>
									<li><a href="shop.php">Shop</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end footer -->

		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<p>Copyrights &copy; 2023 - All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end copyright -->

		<!-- jquery -->
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- count down -->
		<script src="assets/js/jquery.countdown.js"></script>
		<!-- isotope -->
		<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
		<!-- waypoints -->
		<script src="assets/js/waypoints.js"></script>
		<!-- owl carousel -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- magnific popup -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- mean menu -->
		<script src="assets/js/jquery.meanmenu.min.js"></script>
		<!-- sticker js -->
		<script src="assets/js/sticker.js"></script>
		<!-- main js -->
		<script src="assets/js/main.js"></script>

	</body>

	</html>
	<?php
} else {
	header("Location: login.php");
	exit();
}
?>
<!-- Ending Php session -->

</html>
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
                            <h1>Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->
        <section>
            <style>
                .checkout {
                    display: -ms-flexbox;
                    /* IE10 */
                    display: flex;
                    -ms-flex-wrap: wrap;
                    /* IE10 */
                    flex-wrap: wrap;
                    margin: 0 -16px;
                }

                .c3 {
                    -ms-flex: 25%;
                    /* IE10 */
                    flex: 25%;
                }

                .c2 {
                    -ms-flex: 50%;
                    /* IE10 */
                    flex: 50%;
                }

                .c1 {
                    -ms-flex: 75%;
                    /* IE10 */
                    flex: 75%;
                }

                .c2,
                .c3,
                .c1 {
                    padding: 0 16px;
                }

                .con {
                    background-color: #f2f2f2;
                    padding: 5px 20px 15px 20px;
                    border: 1px solid lightgrey;
                    border-radius: 3px;
                }

                input[type=text] {
                    width: 100%;
                    margin-bottom: 20px;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                label {
                    margin-bottom: 10px;
                    display: block;
                }

                .icon-container {
                    margin-bottom: 20px;
                    padding: 7px 0;
                    font-size: 24px;
                }

                .btn {
                    background-color: #04AA6D;
                    color: white;
                    padding: 12px;
                    margin: 10px 0;
                    border: none;
                    width: 25%;
                    border-radius: 3px;
                    cursor: pointer;
                    font-size: 17px;
                }

                .btn:hover {
                    background-color: #45a049;
                }

                span.price {
                    float: right;
                    color: grey;
                }

                /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
                @media (max-width: 800px) {
                    .row {
                        flex-direction: column-reverse;
                    }

                    .col-25 {
                        margin-bottom: 20px;
                    }
                }
            </style>
            <div class="checkout">
                <div class="c1">
                    <div class="con">
                        <form action="buy.php">

                            <div class="checkout">
                                <div class="c3">
                                    <h3>Billing Address</h3>
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="fname" name="firstname" placeholder="John Wick">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="text" id="email" name="email" placeholder="john@example.com">
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" id="adr" name="address" placeholder="3rd cross,Thigalarpete">
                                    <label for="city"><i class="fa fa-institution"></i> City</label>
                                    <input type="text" id="city" name="city" placeholder="Bengaluru">

                                    <div class="row">
                                        <div class="c2">
                                            <label for="state">State</label>
                                            <input type="text" id="state" name="state" placeholder="KA">
                                        </div>
                                        <div class="c2">
                                            <label for="zip">Zip</label>
                                            <input type="text" id="zip" name="zip" placeholder="560069">
                                        </div>
                                    </div>
                                </div>

                                <div class="c2">
                                    <h3>Payment</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="John Wick">
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                    <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="April">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2028">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="693">
                                </div>

                            </div>

                    </div>
                </div>
                <br>
                <div class="c1">
                    <p>
                    <h4>Cart Items:
                        <?php $sql = "SELECT * from cart";

                        if ($result = mysqli_query($conn, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);

                            // Display result
                            printf($rowcount);
                        }
                        ?>
                    </h4>
                    </p>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Continue to checkout" class="btn">
                    </c1>
                    </form>
                </div>
            </div>
        </section>
<?php
include ('db_conn.php');
$dq="DELETE FROM cart";
$result = mysqli_query($conn, $dq);
 ?>
<script type="text/javascript">
window.onload = function () { alert("BUY ORDER PLACED");}
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
    <?php
} else {
    header("Location: login.php");
    exit();
}
?>
<!-- Ending Php session -->

</html>
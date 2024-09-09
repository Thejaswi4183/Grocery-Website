<!-- Starting php session -->
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    ?>
    <?php
    require_once "db_conn.php";

    $sql_cart = "SELECT * FROM cart";
    $all_cart = $conn->query($sql_cart);

    ?>
    <!DOCTYPE html>
    <html>

    <title>CART</title>

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
                            <h1>Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="shop">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        <span>
                            <?php echo mysqli_num_rows(($all_cart)); ?>&nbspItems in Cart
                        </span>

                    </h2>
                </div>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Serial no</th> -->
                            <th scope="col">Item</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>

                    <?php
                    while ($row_cart = mysqli_fetch_assoc($all_cart)) {
                        $sql = "SELECT * FROM products WHERE id=" . $row_cart["product_id"];
                        $all_product = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($all_product)) {

                            ?>
                            <tbody>
                                <tr>
                                    <!-- <th scope="row">1</th> -->
                                    <td>
                                        <img src="./Uploads/<?= $row['image']; ?>" width=70px alt="<?= $item['name']; ?>">
                                    </td>
                                    <td>
                                        <?php echo $row["name"]; ?>
                                    </td>
                                    <td>
                                        ₹&#160;

                                        <a class="price">
                                            <?php echo "$row[price]" ?>
                                        </a>
                                        <input type="hidden" class="iprice" value=<?php echo $row["price"]; ?>>
                                    </td>
                                    <td>
                                        <!-- <input type="number" max="10" value="1" name="quantity"
                                                class="iquantity quantity-field border-4 text-center w-25"> -->

                                        <input class="iquantity text-center" onchange="subtotal()" name="quantity" type="number"
                                            value="1" min="1" max="10">
                                    </td>

                                    <td class="itotal">
                                    </td>

                                    <td>
                                        <style>
                                            .remove {
                                                display: inline-block;
                                                padding: 9px;
                                                margin: -1rem;
                                                border-radius: 30px;
                                                width: 165px;
                                                text-align: center;
                                                -webkit-transition: all .3s;
                                                transition: all .3s;
                                                margin: 5px 0;
                                                font-size: 0.9rem;
                                                background-color: orange;
                                                border: 1px solid #f7444e;
                                                color: #ffffff;
                                            }


                                            .remove:hover {
                                                background-color: transparent;
                                                color: #f7444e;
                                            }
                                        </style>
                                        <button class="remove" data-id=<?php echo $row["id"]; ?>>Remove</button>

                                    </td>


                                </tr>
                                <!-- </div> -->
                    </div>



                    </div>
                    <!-- 
                </div>
                </div> -->

                    <?php

                    ?>
                    <?php
                        }
                    }

                    ?>
            <!-- <td>
           
        </td> -->
            </tbody>
            </table>
            <section>
                <form action="checkout.php" method="post">
                <style>
                    .checkout {
                        display: inline-block;
                        padding: 9px;
                        margin: -1rem;
                        border-radius: 30px;
                        width: 165px;
                        text-align: center;
                        -webkit-transition: all .3s;
                        transition: all .3s;
                        margin: 5px 0;
                        font-size: 0.9rem;
                        background-color: darkred;
                        border: 1px solid #f7444e;
                        color: #ffffff;
                    }


                    .checkout:hover {
                        background-color: transparent;
                        color: #f7444e;
                    }
                </style>
                <button class="checkout" onclick="">CHECKOUT</button>
                </form>
            </section>
            <style>
                b {
                    padding-left: 62.5rem;
                    margin-top: -10rem;
                    font-size: larger;
                }

                #gtotal {
                    text-align: right;
                    margin-top: -1.6rem;
                }
            </style>
            <b>Total : ₹ </b>
            <h5 id="gtotal"></h5>

            <script>
                var remove = document.getElementsByClassName("remove");
                for (var i = 0; i < remove.length; i++) {
                    remove[i].addEventListener("click", function (event) {
                        var target = event.target;
                        var cart_id = target.getAttribute("data-id");
                        var xml = new XMLHttpRequest();
                        xml.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                target.innerHTML = this.responseText;
                                target.style.opacity = .3;
                            }
                        }
                        xml.open("GET", "db_conn.php?cart_id=" + cart_id, true);
                        xml.send();
                    })
                }
                var gt = 0;
                var iprice = document.getElementsByClassName('iprice');
                var iquantity = document.getElementsByClassName('iquantity');
                var itotal = document.getElementsByClassName('itotal');
                var price = document.getElementsByClassName('price');
                var gtotal = document.getElementById('gtotal');
                function subtotal() {
                    gt = 0;
                    for (i = 0; i < price.length; i++) {

                        itotal[i].innerText = "₹" + " " + (iprice[i].value) * (iquantity[i].value);
                        gt = gt + (iprice[i].value) * (iquantity[i].value);
                    }
                    gtotal.innerText = gt;
                }

                subtotal();
            </script>
        </section>
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
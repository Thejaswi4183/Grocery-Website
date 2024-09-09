<?php
session_start();
if (isset($_SESSION['id']) || isset($_SESSION['user_name'])) {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
      Admin Panel
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href=".\css\material-dashboard.css" rel="stylesheet" />
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .btn {
      background-color: #fc5603;
      color: #fff;
      font-weight: 400;
      padding-right: 8%;
      padding-left: 8%;
      padding-bottom: 8px;
      padding-top: 8px;
      border-radius: 5px;
      border-width: 0px;
      margin-top: 6px;
    }
  </style>

  <body class="g-sidenav-show  bg-gray-200">
    <aside
      class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
      id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
          aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="admin.php">
          <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
        </a>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">


          <li class="nav-item">
            <a class="nav-link text-white" href="category.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">All Categories</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="items.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">All Items</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white " href="add_category.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">add</i>
              </div>
              <span class="nav-link-text ms-1">Add Category</span>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link text-white " href="add_item.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">add</i>
              </div>
              <span class="nav-link-text ms-1">Add Item</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
          <a class="btn bg-gradient-primary mt-4 w-100" href="adminlogout.php" type="button">Log Out</a>
        </div>
      </div>
    </aside>
    <main class="main-content">
      <div class="container py-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="font-weight-bold mb-1">Items</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include('db_conn.php');
                    function getAll($products)
                    {
                      global $conn;
                      $query = "SELECT * FROM $products";
                      return $query_run = mysqli_query($conn, $query);
                    }

                    $category = getAll("products");

                    if (mysqli_num_rows($category) > 0) {
                      foreach ($category as $item) {
                        ?>
                        <tr>
                          <td>
                            <?= $item['id']; ?>
                          </td>
                          <td>
                            <?= $item['name']; ?>
                          </td>
                          <td>
                            <?= $item['slug']; ?>
                          </td>
                          <td>
                            <img src="./Uploads/<?= $item['image']; ?>" width=70px alt="<?= $item['name']; ?>">
                          </td>
                          <td>
                            <?= $item['status'] == '0' ? "Visible" : "Hidden" ?>
                          </td>
                          <td>
                            <form action="code.php" method="POST">
                              <input type="hidden" value="<?= $item['id']; ?>" name="item_id">
                              <button type="submit" class="btn btn-danger" name="delete_items_btn">Delete
                            </form>
                          </td>
                        </tr>

                        <?php
                      }
                    } else {
                      echo "No Records Found";
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
  <?php
} else {
  header("Location: login.php");
  exit();
}
?>

</html>
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href=".\css\material-dashboard.css" rel="stylesheet" />
  </head>
  <!-- Alerify JS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
  <!-- Boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .form-control {
      border: 1px solid #b3a1a1 !important;
      padding: 8px 10px;
    }

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
  </style>

  <body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
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
            <a class="nav-link text-white" href="category.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">All Items</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="add_category.php">
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
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <!-- End Navbar -->

      <div class="container-fluid py-6">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="font-weight-bolder mb-1">Add Category</h2>
              </div>
              <div class="card-body">
                <form action="code.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="mb-0">Name</label>
                      <input type="text" name="name" placeholder="Enter Category Name" required class="form-control">
                    </div>

                    <div class="col-md-12">
                      <label class="mb-0">Description</label>
                      <textarea rows="3" name="description" placeholder="Enter Description" required class="form-control">
                    </textarea>
                    </div>

                    <div class="col-md-12">
                      <label class="mb-0">Upload Image</label>
                      <input type="file" name="image" required class="form-control">
                    </div>
                    

                    <div class="col-md-12">
                      <label class="mb-0">Meta Title</label>
                      <input type="text" name="meta_title" required placeholder="Enter Meta Title" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-6">
                      <label class="mb-0">Status</label>
                      <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6">
                      <label class="mb-0">Popular</label>
                      <input type="checkbox" name="popular">
                    </div>

                    <div class="col-md-12">
                      <button type="submit" class="button" name="add_category_btn">Save</button>
                    </div>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <script>
        <?php if (isset($_SESSION['message'])) { ?>

          alertify.set('notifier', 'position', 'top-right');
          alertify.success('<?= $_SESSION['message'] ?>');
        <?php
          unset($_SESSION['message']);
        }
        ?>
      </script>
  </body>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>
<!-- Ending php Session -->

  </html>
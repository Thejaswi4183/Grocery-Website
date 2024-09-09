<?php
session_start();
include('db_conn.php');
include('redirect.php');
if (isset($_POST['add_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $meta_title = $_POST['meta_title'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $path = "Uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $image;

    $cate_query = "INSERT INTO categories (category_id,name,description,image,meta_title,status,popular)
  VALUES ('$category_id','$name','$description','$image','$meta_title','$status','$popular')";

    $cate_query_run = mysqli_query($conn, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("add_category.php", "Category Added SuccesFully");
    } else {
        redirect("add_category.php", "Something went Wrong");
    }
} else if (isset($_POST['add_item_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $meta_keywords = $_POST['meta_keywords'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $image;
    $path = "Uploads";

    $item_query = "INSERT INTO products (category_id,name,description,image,price,meta_keywords,slug,status) VALUES ('$category_id','$name','$description','$image','$price','$meta_keywords','$slug','$status')";
    $item_run_query = mysqli_query($conn, $item_query);

    if ($item_run_query) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("add_item.php", "Item   Added SuccesFully");
    } else {
        redirect("add_item.php", "Something went Wrong");
    }
} elseif (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $delete_query = "DELETE FROM categories WHERE category_id='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        redirect("category.php", "Category Deleted Successfully");
    } else {
        redirect("category.php", "Something went wrong");
    }
} elseif (isset($_POST['delete_items_btn'])) {
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $delete_query = "DELETE FROM products WHERE id='$item_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        redirect("items.php", "Products Deleted Successfully");
    } else {
        redirect("items.php", "Something went wrong");
    }
}
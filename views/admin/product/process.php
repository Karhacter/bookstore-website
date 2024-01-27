<?php

use App\Models\Product;

if (isset($_POST['THEM'])) {
    $product = new Product();

    $product->name = $_POST['name'];
    $product->slug = str_slug($_REQUEST['name']);
    $product->description = $_REQUEST['description'];
    $product->detail = $_REQUEST['detail'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    $product->qty = $_REQUEST["qty"];
    $product->price = $_REQUEST["price"];
    $product->category_id = $_REQUEST["category_id"];
    $product->brand_id = $_REQUEST["brand_id"];
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $product->status = $_REQUEST["status"];
    // insert values to database 
    $product->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=product");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $product = Product::find($id);
    $product->name = $_POST['name'];
    $product->slug = str_slug($_REQUEST['name']);
    $product->description = $_REQUEST['description'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/product/" . $product->image)) {
                unlink("../public/images/product/" . $product->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    $product->qty = $_REQUEST["qty"];
    $product->price = $_REQUEST["price"];
    $product->category_id = $_REQUEST["category_id"];
    $product->brand_id = $_REQUEST["brand_id"];
    $product->updated_at = date('Y-m-d H:i:s');
    $product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $product->status = $_REQUEST["status"];
    // insert values to database 
    $product->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=product");
}

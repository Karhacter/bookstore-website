<?php

use App\Models\Category;

if (isset($_POST['THEM'])) {
    $category = new Category();

    $category->name = $_REQUEST['name'];
    $category->slug = str_slug($_REQUEST['name']);
    $category->description = $_REQUEST['description'];
    $category->sort_order = $_REQUEST['sort_order'];
    $category->parent_id = $_REQUEST['parent_id'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/category/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $category->image = $filename;
        }
    }

    $category->created_at = date('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $category->status = $_REQUEST["status"];
    // insert values to database 
    $category->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=category");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $category = Category::find($id);
    $category->name = $_POST['name'];
    $category->slug = str_slug($_REQUEST['name']);
    $category->description = $_REQUEST['description'];
    $category->parent_id = $_REQUEST['parent_id'];
    $category->sort_order = $_REQUEST['sort_order'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/category/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/category/" . $category->image)) {
                unlink("../public/images/category/" . $category->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $category->image = $filename;
        }
    }

    $category->updated_at = date('Y-m-d H:i:s');
    $category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $category->status = $_REQUEST["status"];
    // insert values to database 
    $category->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=category");
}

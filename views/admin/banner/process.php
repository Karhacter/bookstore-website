<?php

use App\Models\Banner;

if (isset($_POST['THEM'])) {
    $banner = new Banner();

    $banner->name = $_POST['name'];
    $banner->link = $_REQUEST['link'];
    $banner->description = $_REQUEST['description'];
    $banner->position = $_REQUEST['position'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }

    $banner->created_at = date('Y-m-d H:i:s');
    $banner->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $banner->status = $_REQUEST["status"];
    // insert values to database 
    $banner->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=banner");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $banner = banner::find($id);
    $banner->name = $_POST['name'];
    $banner->link = $_REQUEST['link'];
    $banner->description = $_REQUEST['description'];
    $banner->position = $_REQUEST['position'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/banner/" . $banner->image)) {
                unlink("../public/images/banner/" . $banner->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }

    $banner->updated_at = date('Y-m-d H:i:s');
    $banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $banner->status = $_REQUEST["status"];
    // insert values to database 
    $banner->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=banner");
}

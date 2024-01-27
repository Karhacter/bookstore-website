<?php

use App\Models\menu;

if (isset($_POST['THEM'])) {
    $menu = new menu();

    $menu->name = $_POST['name'];
    $menu->slug = str_slug($_REQUEST['name']);
    $menu->description = $_REQUEST['description'];
    $menu->sort_order = $_REQUEST['sort_order'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/menu/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $menu->image = $filename;
        }
    }

    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $menu->status = $_REQUEST["status"];
    // insert values to database 
    $menu->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=menu");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $menu = menu::find($id);
    $menu->name = $_POST['name'];
    $menu->slug = str_slug($_REQUEST['name']);
    $menu->description = $_REQUEST['description'];
    $menu->sort_order = $_REQUEST['sort_order'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/menu/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/menu/" . $menu->image)) {
                unlink("../public/images/menu/" . $menu->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $menu->image = $filename;
        }
    }

    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $menu->status = $_REQUEST["status"];
    // insert values to database 
    $menu->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=menu");
}

<?php

use App\Models\Topic;

if (isset($_POST['THEM'])) {
    $topic = new Topic();

    $topic->name = $_POST['name'];
    $topic->slug = str_slug($_REQUEST['name']);
    $topic->description = $_REQUEST['description'];
    $topic->sort_order = $_REQUEST['sort_order'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/topic/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $topic->image = $filename;
        }
    }

    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $topic->status = $_REQUEST["status"];
    // insert values to database 
    $topic->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=post");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $topic = Topic::find($id);
    $topic->name = $_POST['name'];
    $topic->slug = str_slug($_REQUEST['name']);
    $topic->description = $_REQUEST['description'];
    $topic->sort_order = $_REQUEST['sort_order'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/topic/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/topic/" . $topic->image)) {
                unlink("../public/images/topic/" . $topic->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $topic->image = $filename;
        }
    }

    $topic->updated_at = date('Y-m-d H:i:s');
    $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $topic->status = $_REQUEST["status"];
    // insert values to database 
    $topic->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=post");
}

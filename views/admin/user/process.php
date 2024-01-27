<?php

use App\Models\User;

if (isset($_POST['THEM'])) {
    $user = new User();

    $user->name = $_POST['name'];
    $user->phone = $_REQUEST['phone'];
    $user->email = $_REQUEST['email'];
    $user->gender = $_REQUEST['gender'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
        }
    }

    $user->username = $_REQUEST["username"];
    $user->address = $_REQUEST["address"];
    $user->roles = $_REQUEST["roles"];
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $user->status = $_REQUEST["status"];
    // insert values to database 
    $user->password = $_REQUEST["password"];
    $re_password = $_REQUEST["re_password"];
    if ($password != $re_password) {
        set_flash("message", ["type" => "danger", "msg" => "Thêm thất bại, Mật khẩu không khớp"]);
        header("location:index.php?opt=user&cat=create");
    } else {
        set_flash("message", ["type" => "sucess", "msg" => "Thêm thành công"]);
        header("location:index.php?opt=user");
        $user->save();
    }
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $user = user::find($id);
    $user->name = $_POST['name'];
    $user->slug = str_slug($_REQUEST['name']);
    $user->description = $_REQUEST['description'];


    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            if (file_exists("../public/images/user/" . $user->image)) {
                unlink("../public/images/user/" . $user->image);
            }
            $filename = date('YmdHis') . '.' . $imageFileType;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
        }
    }
    $user->qty = $_REQUEST["qty"];
    $user->price = $_REQUEST["price"];
    $user->category_id = $_REQUEST["category_id"];
    $user->brand_id = $_REQUEST["brand_id"];
    $user->updated_at = date('Y-m-d H:i:s');
    $user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $user->status = $_REQUEST["status"];
    // insert values to database 
    $user->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=user");
}

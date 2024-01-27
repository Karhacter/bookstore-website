<?php

use App\Models\Category;

$id = $_REQUEST['id'];
$category = Category::where('id', '=', $id)->first();
if ($category == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=category');
}
//
$category->status = 0;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$category->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header('location:index.php?opt=category');

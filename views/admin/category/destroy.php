<?php

use App\Models\Category;

$id = $_REQUEST['id'];
$category = Category::find($id);
if ($category == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=category&cat=trash');
}
//
if (file_exists("../public/images/category/" . $category->image)) {
    unlink("../public/images/category/" . $category->image);
}
$category->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header('location:index.php?opt=category&cat=trash');

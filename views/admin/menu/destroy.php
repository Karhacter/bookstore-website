<?php

use App\Models\menu;

$id = $_REQUEST['id'];
$menu = menu::find($id);
if ($menu == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=menu&cat=trash');
}
//
if (file_exists("../public/images/menu/" . $menu->image)) {
    unlink("../public/images/menu/" . $menu->image);
}
$menu->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header('location:index.php?opt=menu&cat=trash');

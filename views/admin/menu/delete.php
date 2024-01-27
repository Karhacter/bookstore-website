<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$menu = Menu::where('id', '=', $id)->first();
if ($menu == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=menu');
}
//
$menu->status = 0;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$menu->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header('location:index.php?opt=menu');

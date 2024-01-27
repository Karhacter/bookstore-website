<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner = Banner::where('id', '=', $id)->first();
if ($banner == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=banner');
}
//
$banner->status = 0;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$banner->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header('location:index.php?opt=banner');

<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::where('id', '=', $id)->first();
if ($brand == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=brand');
}
//
$brand->status = ($brand->status == 1) ? 2 : 1;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$brand->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header('location:index.php?opt=brand');

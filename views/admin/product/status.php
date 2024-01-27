<?php

use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::where('id', '=', $id)->first();
if ($product == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=product');
}
//
$product->status = ($product->status == 1) ? 2 : 1;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$product->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header('location:index.php?opt=product');

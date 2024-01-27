<?php

use App\Models\Order;

$id = $_REQUEST['id'];
$order = Order::where('id', '=', $id)->first();
if ($order == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=order');
}
//
$order->status = ($order->status == 1) ? 2 : 1;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$order->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header('location:index.php?opt=order');

<?php

use App\Models\User;

$id = $_REQUEST['id'];
$customer = User::where('id', '=', $id)->first();
if ($customer == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=customer&cat=trash');
}
//
$customer->status = 2;
$customer->updated_at = date('Y-m-d H:i:s');
$customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$customer->save();
set_flash("message", ["type" => "success", "msg" => "Khôi phục thành công"]);
header('location:index.php?opt=customer&cat=trash');

<?php

use App\Models\User;

$id = $_REQUEST['id'];
$user = User::where('id', '=', $id)->first();
if ($user == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=user&cat=trash');
}
//
$user->status = 2;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$user->save();
set_flash("message", ["type" => "success", "msg" => "Khôi phục thành công"]);
header('location:index.php?opt=user&cat=trash');

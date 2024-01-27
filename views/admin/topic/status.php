<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::where('id', '=', $id)->first();
if ($topic == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=topic');
}
//
$topic->status = ($topic->status == 1) ? 2 : 1;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header('location:index.php?opt=topic');

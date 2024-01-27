<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$post = Post::where('id', '=', $id)->first();
if ($post == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=post');
}
//
$post->status = ($post->status == 1) ? 2 : 1;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$post->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header('location:index.php?opt=post');

<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$post = Post::find($id);
if ($post == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=post&cat=trash');
}
//
if (file_exists("../public/images/post/" . $post->image)) {
    unlink("../public/images/post/" . $post->image);
}
$post->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header('location:index.php?opt=post&cat=trash');

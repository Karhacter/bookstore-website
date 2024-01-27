<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner = Banner::find($id);
if ($banner == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=banner&cat=trash');
}
//
if (file_exists("../public/images/banner/" . $banner->image)) {
    unlink("../public/images/banner/" . $banner->image);
}
$banner->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header('location:index.php?opt=banner&cat=trash');

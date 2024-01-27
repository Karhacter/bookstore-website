<?php

use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header('location:index.php?opt=product&cat=trash');
}
//
if (file_exists("../public/images/product/" . $product->image)) {
    unlink("../public/images/product/" . $product->image);
}
$product->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header('location:index.php?opt=product&cat=trash');

<?php
$title = 'Trang chủ';

use App\Models\Category;
use App\Models\Product;

$list_catid = [];
//them phan tu mang
array_push($list_catid, $row_cat->id);
$list_category1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', 1]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_catid, $row_cat1->id);
        $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', 1]])
            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_catid, $row_cat2->id);
            }
        }
    }
}
//San pham 
$list_product = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_catid)
    ->orderBy('created_at', 'ASC')
    ->limit(10)->get();
?>


<div class="product-category mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="category-title bg-main">
                <h1 class="fs-5 py-3 text-center text-uppercase"><?= $row_cat->name; ?></h1>
                <?php if (strlen($row_cat->image) > 0) : ?>
                    <img class="img-fluid d-none d-md-block" src="public/images/category/<?= $row_cat->image; ?>" alt="<?= $row_cat->image; ?>">
                <?php else : ?>
                    <img class="img-fluid d-none d-md-block" src="public/images/category/" alt="<?= $row_cat->image; ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row product-list">
                <?php foreach ($list_product as $product) : ?>
                    <?php require 'views/sites/product_item.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
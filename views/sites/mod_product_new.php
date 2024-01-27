<?php

use App\Models\Product;

$list_products = Product::where('status', '=', 1)
    ->orderBy('created_at', 'DESC')
    ->limit(2)
    ->get();
?>

<ul class="list-group mb-3 list-product-new">
    <li class="list-group-item bg-main py-3">Sản phẩm mới</li>
    <li class="list-group-item">
        <?php foreach ($list_products as $products) : ?>
            <div class="product-item border">
                <div class="product-item-image">
                    <a href="index.php?opt=product_detail">
                        <img src="public/images/product/<?= $products->image; ?>" class="img-fluid" alt="">
                    </a>
                </div>
                <h2 class="product-item-name text-main text-center fs-5 py-1">
                    <a href="index.php?opt=product_detail"><?= $products->name; ?></a>
                </h2>
                <h3 class="product-item-price fs-6 p-2 d-flex">
                    <?php if ($products->pricesale != null) : ?>
                        <div class="flex-fill">
                            <?= number_format($products->pricesale) ?>đ
                        </div>
                        <div class="flex-fill text-end text-main ">
                            <del><?= number_format($products->price) ?>đ</del>
                        </div>
                    <?php else : ?>
                        <div class="flex-fill"><?= number_format($products->price) ?>đ</div>
                    <?php endif; ?>
                </h3>
            </div>
        <?php endforeach; ?>
    </li>
</ul>
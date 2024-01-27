<div class="col-6 col-md-3 mb-4 ut2-gl__body content-on-hover">
    <div class="product-item border">
        <div class="product-item-image">
            <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
                <img src="public/images/product/<?= $product->image; ?>" class="img-fluid w-100" alt="" id="img1">
                <!-- <img class="img-fluid" src="public/images/product/" alt="" id="img2"> -->
            </a>
        </div>
        <h2 class="product-item-name text-main text-center fs-5 py-1">
            <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
                <?= $product->name ?>
            </a>
        </h2>
        <h3 class="product-item-price fs-6 p-2 d-flex text-danger">
            <?php if ($product->pricesale != null) : ?>
                <div class="flex-fill">
                    <?= number_format($product->pricesale) ?>đ
                </div>
                <div class="flex-fill text-end text-main ">
                    <del><?= number_format($product->price) ?>đ</del>
                </div>
            <?php else : ?>
                <div class="flex-fill"><?= number_format($product->price) ?>đ</div>
            <?php endif; ?>
        </h3>
    </div>
</div>
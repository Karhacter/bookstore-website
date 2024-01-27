<?php

use App\Libraries\Cart;

$title = 'Giỏ hàng';

$listcart = Cart::getContent('cart');
?>


<?php require_once "views/sites/header.php"; ?>

<section class="bg-light">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
                <li class="breadcrumb-item">
                    <a class="text-main" href="index.php">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Giỏ hàng của bạn
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="hdl-maincontent py-2">
    <div class="container">
        <form action="index.php?opt=cart&updatecart=true" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark">
                        <th style="width:30px;" class="text-center">STT</th>
                        <th style="width:100px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th style="width:130px" class='text-center'>Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($listcart) > 0) : ?>
                        <?php
                        $stt = 1;
                        ?>
                        <?php foreach ($listcart as $items) : ?>
                            <?php if ($items['pricesale'] != null) : ?>
                                <?php $money_item = $items['qty'] * $items['pricesale']; ?>
                            <?php else : ?>
                                <?php $money_item = $items['qty'] * $items['price']; ?>
                            <?php endif; ?>
                            <tr>
                                <td class="text-center align-middle"><?= $stt; ?></td>
                                <td>
                                    <img class="img-fluid" src="public/images/product/<?= $items['image'] ?>" alt="<?= $items['image'] ?>">
                                </td>
                                <td class="align-middle"><?= $items['name'] ?></td>
                                <td class="text-center align-middle">
                                    <?php if ($items['pricesale'] != null) : ?>
                                        <?= number_format($items['pricesale']) ?>
                                    <?php else : ?>
                                        <?= number_format($items['price']) ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="sub" onclick="changenumber(id)">-</span>
                                        <input type="text" value="<?= $items['qty'] ?> " id="qty" name="qty[<?= $items['id']; ?>]
                                    " class="form-control text-center">
                                        <span class="input-group-text" id="add" onclick="changenumber(id)">+</span>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <?= number_format($money_item); ?>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?opt=cart&deletecart=<?= $items['id']; ?>" class="btn btn-sm btn-main">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">Chưa có sản phẩm</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <button class="btn btn-main" type="submit">Cập nhật</button>
                            <a href="index.php?opt=checkout" class="btn btn-main">Thanh toán</a>
                        </td>
                        <td colspan="2" class="text-end">
                            <strong>Tổng tiền: <?= number_format(Cart::getTotalPrice('cart')) ?></strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <script>
        function changenumber(id) {
            var qty = parseInt(document.getElementById("qty").value);
            if (id == 'sub') {
                if (qty > 0) {
                    qty = qty - 1;
                }
            } else {
                qty = qty + 1;
            }
            document.getElementById("qty").value = qty.toString();
        }
    </script>
</section>

<?php require_once "views/sites/footer.php" ?>
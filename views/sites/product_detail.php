<?php

use App\Models\Product;
use App\Models\Category;

$slug = $_REQUEST['slug'];
$pro = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$title = $pro->name;

$catid = $pro->category_id;
$list_catid = [];
//them phan tu mang
array_push($list_catid, $catid);
$list_category1 = Category::where([['parent_id', '=', $catid], ['status', '=', 1]])
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
$list_other = Product::where([['status', '=', 1], ['id', '!=', $pro->id]])
   ->whereIn('category_id', $list_catid)
   ->orderBy('created_at', 'ASC')
   ->limit(4)
   ->get();

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
               <?= $pro->name; ?>
            </li>
         </ol>
      </nav>
   </div>
</section>

<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="image">
               <img id="productimage" class="img-fluid w-100" src="public/images/product/<?= $pro->image ?>" alt="<?= $pro->image ?>">
            </div>
            <div class="list-image mt-3">
               <div class="row">
                  <div class="col-3">
                     <img class="img-fluid w-100" src="public/images/product/<?= $pro->image ?>" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="public/images/product/<?= $pro->image2 ?>" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="public/images/product/<?= $pro->image3 ?>" alt="" onclick="changeimage(src)">
                  </div>
               </div>
            </div>
            <script>
               function changeimage(src) {
                  document.getElementById("productimage").src = src;
               }
            </script>
         </div>
         <div class="col-md-6">
            <h1 class="text-main"> <?= $pro->name; ?></h1>
            <h3 class="fs-5"> <?= word_limit($pro->detail, 20) ?>
            </h3>
            <h2 class="text-main py-4   p-2 h1">
               <?php if ($pro->pricesale != null) : ?>
                  <div class="flex-fill text-left h4">
                     <del><?= number_format($pro->price) ?> đ</del>
                  </div>
                  <div class="flex-fill text-danger">
                     <?= number_format($pro->pricesale) ?> đ
                  </div>
               <?php else : ?>
                  <div class="flex-fill text-danger h1"><?= number_format($pro->price) ?> đ</div>
               <?php endif; ?>
            </h2>
            <div class="mb-3">
               <label for="">Số lượng</label> <br>
               <div class="input-group mb-3">
                  <span class="input-group-text" id="sub" onclick="changenumber(id)">-</span>
                  <input type="text" value="1" id="qty" class="text-center" size="3">
                  <span class="input-group-text" id="add" onclick="changenumber(id)">+</span>
               </div>
            </div>
            <div class="mb-3">
               <a class="btn btn-main" href="index.php?opt=checkout">Mua ngay</a>
               <button class="btn btn-main" onclick="addcart(<?= $pro->id; ?>)" aria-hidden="true">Thêm vào giỏ hàng</button>
            </div>
         </div>
      </div>
      <div class="row">
         <h2 class="text-main fs-4 pt-4">Chi tiết sản phẩm</h2>
         <p>
            <?= ($pro->detail) ?>
         </p>
      </div>
      <?php if (count($list_other) > 0) : ?>
         <div class="row">
            <h2 class="text-main fs-4 pt-4">Sản phẩm khác</h2>
            <div class="product-category mt-3">
               <div class="row product-list">
                  <?php foreach ($list_other as $product) : ?>
                     <?php require "views/sites/product_item.php" ?>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      <?php endif; ?>
   </div>
</section>
<script>
   function addcart(id) {
      const qty = document.getElementById("qty").value;
      $.ajax({
         url: "index.php?opt=cart&addcart=true",
         type: "GET",
         data: {
            id: id,
            qty: qty
         },
         success: function(result) {
            $("#showcart").html(result);
            alert('Them thanh cong');
         }
      });
   }

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
<?php require_once "views/sites/footer.php" ?>
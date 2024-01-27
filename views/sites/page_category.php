<?php
$title = 'Giới thiệu';

use App\Models\Post;

$slug = $_REQUEST['cat'];
$page = Post::where([['slug', '=', $slug], ['type', '=', 'page'], ['status', '=', 1]])->first();

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
               Trang đơn
            </li>
         </ol>
      </nav>
   </div>
</section>

<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <ul class="list-group mb-3 list-page">
               <li class="list-group-item bg-main py-3">Các trang khác</li>
               <li class="list-group-item">
                  <a href="index.php?opt=page&cat=chinh-sach-hoan-tien">Chính sách mua hàng</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php?opt=page&cat=chinh-sach-van-chuyen">Chính sách vận chuyển</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php?opt=page&cat=chinh-sach-doi-hang">Chính sách đổi trả</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php?opt=page&cat=chinh-sach-bao-hanh">Chính sách bảo hành</a>
               </li>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main"><?= $page->title ?></h1>
            <p><?= $page->detail ?></p>
            <img src="public/images/<?= $page->image; ?>" alt="">
         </div>
      </div>
   </div>
</section>
<?php require_once "views/sites/footer.php" ?>
<?php

$title = 'Chi tiết bài viết';

use App\Models\Topic;

$slug = $_REQUEST['slug'];
$topic = Topic::where([['slug', '=', $slug], ['status', '=', 1]])->first();
$list_topic = Topic::where('status', '=', 1)
   ->orderBy('created_at', 'DESC')
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
               Chi tiết bài viết
            </li>
         </ol>
      </nav>
   </div>
</section>

<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <?php require_once "views/sites/mod_list_category.php"; ?>
            <?php require_once "views/sites/mod_list_brand.php"; ?>
            <?php require_once "views/sites/mod_product_new.php"; ?>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main"><?= $topic->name; ?></h1>
            <p>
               <?= $topic->description; ?>
            </p>
            <h3 class="fs-4 text-main">
               <strong>Bài viết khác</strong>
            </h3>
            <ul class="post-list-other">
               <?php foreach ($list_topic as $topics) : ?>
                  <li><a href="index.php?opt=post&slug=<?= $topics->slug; ?>"><?= $topics->name; ?></a></li>
               <?php endforeach; ?>
            </ul>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/sites/footer.php" ?>
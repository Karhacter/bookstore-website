<?php

use App\Libraries\Pagination;
use App\Models\Topic;

$title = 'Tin tức';

$total = Topic::where('status', '=', 1)->count();
$limit = 5;
$page = Pagination::pageCurrent();
$offset = Pagination::pageOffset($page, $limit);

$list_topic = Topic::where('status', '=', 1)
   ->orderBy('created_at', 'DESC')
   ->skip($offset)
   ->limit($limit)
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
               Tin tức
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
            <div class="post-topic-title bg-main">
               <h3 class="fs-5 py-3 text-center">TIN TỨC</h3>
            </div>
            <div class="post-topic mt-3">
               <?php foreach ($list_topic as $topic) : ?>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="index.php?opt=post&slug=<?= $topic->slug ?>">
                              <img src="public/images/post/<?= $topic->image; ?>" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title fs-5 py-1">
                           <a href="index.php?opt=post&slug=<?= $topic->slug ?>">
                              <?= $topic->name; ?>
                           </a>
                        </h2>
                        <p><?= word_limit($topic->description, 50); ?></p>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
            <?= Pagination::pageLinks($total, $page, $limit, 'index.php?opt=post_topic'); ?>

         </div>
      </div>
   </div>
</section>
<?php require_once "views/sites/footer.php" ?>
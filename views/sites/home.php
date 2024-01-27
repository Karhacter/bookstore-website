<?php
$title = 'Trang chủ';

use App\Models\Category;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')->get();

?>

<?php require_once "views/sites/header.php"; ?>
<div>
   <?php require_once "views/sites/mod-slider.php"; ?>
</div>


<section class="hdl-maincontent">
   <div class="container">
      <?php foreach ($list_category as $row_cat) : ?>
         <?php require "views/sites/product_category_home.php" ?>
      <?php endforeach; ?>
   </div>
</section>

<?php require_once "views/sites/mod_lastpost.php"; ?>
<?php require_once "views/sites/footer.php"; ?>
<?php

use App\Models\Category;

$mod_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>

<ul class="list-group mb-3 list-category">
    <li class="list-group-item bg-main py-3"> Thể loại</li>
    <?php foreach ($mod_category as $category) : ?>
        <li class="list-group-item">
            <a href="index.php?opt=product&cat=<?= $category->slug ?>"><?= $category->name ?></a>
        </li>
    <?php endforeach; ?>
</ul> 
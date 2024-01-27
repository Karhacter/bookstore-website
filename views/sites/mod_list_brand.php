<?php

use App\Models\Brand;

$mod_brand = Brand::where('status', '=', 1)
    ->orderBy('sort_order',)
    ->get();
?>

<ul class="list-group mb-3 list-brand">
    <li class="list-group-item bg-main py-3">Nhà Xuất Bản</li>
    <?php foreach ($mod_brand as $brands) : ?>
        <li class="list-group-item">
            <a href="index.php?opt=brand&cat=<?= $brands->slug ?>"><?= $brands->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>
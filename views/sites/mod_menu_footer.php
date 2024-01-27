<?php

use App\Models\Menu;

// menu
$mod_menu_footer = Menu::where([['parent_id', '=', 0], ['status', '=', 1], ['position', '=', 'footermenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>

<ul class="footer-menu">
    <?php foreach ($mod_menu_footer as $mod_menu_item) : ?>
        <li>
            <a href="<?= $mod_menu_item->link ?>"><?= $mod_menu_item->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>
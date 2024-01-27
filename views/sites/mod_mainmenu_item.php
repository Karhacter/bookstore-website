<?php

use App\Models\Menu;

$mod_menu_sub = Menu::where([['parent_id', '=', $item_mod_menu->id], ['status', '=', 1], ['position', '=', 'mainmenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>

<?php if (count($mod_menu_sub) == 0) : ?>
    <li class="nav-item">
        <a class="nav-link text-white" href="<?= $item_mod_menu->link ?>">
            <?= $item_mod_menu->name ?>
        </a>
    </li>
<?php else : ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="<?= $item_mod_menu->link ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $item_mod_menu->name; ?>
        </a>        
        <ul class="dropdown-menu">
            <?php foreach ($mod_menu_sub as $mod_menu_item) : ?>
                <li>
                    <a class="dropdown-item text-main" href="<?= $mod_menu_item->link; ?>"> <?= $mod_menu_item->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>
<?php

use App\Models\Category;
use App\Models\Menu;

//category
$mod_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')
    ->get();
// menu
$mod_menu = Menu::where([['parent_id', '=', 0], ['status', '=', 1], ['position', '=', 'mainmenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>

<section class="hdl-mainmenu bg-main">
    <div class="row">
        <div class="col-12 d-none d-md-block col-md-2 d-none d-md-block">
            <div class="dropdown list-category">
                <strong class="dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false">
                    Danh mục sản phẩm
                </strong>
                <ul class="dropdown-menu w-100">
                    <?php foreach ($mod_category as $rowcat) : ?>
                        <li>
                            <a class="dropdown-item" href="index.php?opt=product&cat=<?php echo $rowcat->slug; ?>"><?php echo $rowcat->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-9">
                <nav class="navbar navbar-expand-lg bg-main">
                    <div class="container-fluid">
                        <a class="navbar-brand d-block d-sm-none text-white" href="index.php">KARHACTERSHOP</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php
                                foreach ($mod_menu as $item_mod_menu) {
                                    require "views/sites/mod_mainmenu_item.php";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
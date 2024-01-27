<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="https://cdn2.iconfinder.com/data/icons/web-solid/32/user-512.png">
    <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../public/css/backend.css">

</head>

<body>
    <section class="hdl-header sticky-top">
        <div class="container-fluid">
            <ul class="menutop">
                <li>
                    <a href="index.php">
                        <i class="fa-brands fa-dashcube"></i> Shop Sách
                    </a>
                </li>
                <li class="text-phai">
                    <a href="logout.php">
                        <i class="fa-solid fa-power-off"></i> Thoát
                    </a>
                </li>
                <li class="text-phai">
                    <a href="logout.php" class="nav-link">
                        <i class="fa fa-user" aria-hidden="true"></i> Chào,
                        <?= ($_SESSION['name']) ?? "name"; ?>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="hdl-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 bg-dark p-0 hdl-left">
                    <div class="hdl-left">
                        <div class="dashboard-name">
                            Bảng điều khiển
                        </div>
                        <nav class="m-2 mainmenu">
                            <ul class="main">
                                <li class="hdlitem item-sub">
                                    <i class="fa-brands fa-product-hunt icon-left"></i>
                                    <a href="#">Sản phẩm</a>
                                    <i class="fa-solid fa-plus icon-right"></i>
                                    <ul class="submenu">
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=product">Tất cả sản phẩm</a>
                                        </li>
                                        <li>
                                            <a href="index.php?opt=product&cat=import">Nhập hàng</a>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=category">Danh mục</a>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=brand">Thương hiệu</a>
                                        </li>
                                        <li>
                                            <a href="index.php?opt=product&cat=sale">Khuyễn mãi</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hdlitem item-sub">
                                    <i class="fa-brands fa-product-hunt icon-left"></i>
                                    <a href="#">Bài viết</a>
                                    <i class="fa-solid fa-plus icon-right"></i>
                                    <ul class="submenu">
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=post">Tất cả bài viết</a>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=topic">Chủ đề</a>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=page">Trang đơn</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hdlitem item-sub">
                                    <i class="fa-brands fa-product-hunt icon-left"></i>
                                    <a href="#">Quản lý bán hàng</a>
                                    <i class="fa-solid fa-plus icon-right"></i>
                                    <ul class="submenu">
                                        <li>
                                            <i class="fa-regular fa-circle icon-left"></i>
                                            <a href="index.php?opt=order">Tất cả đơn hàng</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="hdlitem">
                                    <i class="fa-regular fa-circle icon-left"></i>
                                    <a href="index.php?opt=customer">Khách hàng</a>
                                </li>
                                <li class="hdlitem">
                                    <i class="fa-regular fa-circle icon-left"></i>
                                    <a href="index.php?opt=contact">Liên hệ</a>
                                </li>
                                <li class="hdlitem item-sub">
                                    <i class="fa-brands fa-product-hunt icon-left"></i>
                                    <a href="#">Giao diện</a>
                                    <i class="fa-solid fa-plus icon-right"></i>
                                    <ul class="submenu">
                                        <li>
                                            <a href="index.php?opt=menu">Menu</a>
                                        </li>
                                        <li>
                                            <a href="index.php?opt=banner">Banner</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hdlitem item-sub">
                                    <i class="fa-brands fa-product-hunt icon-left"></i>
                                    <a href="#">Hệ thống</a>
                                    <i class="fa-solid fa-plus icon-right"></i>
                                    <ul class="submenu">
                                        <li>
                                            <a href="index.php?opt=user">Thành viên</a>
                                        </li>
                                        <li>
                                            <a href="index.php?opt=config">Cấu hình</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-10">
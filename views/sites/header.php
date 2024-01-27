<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" href="public/images/icon2.png">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="public/css/frontend.css">
    <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="public/jquery/jquery-3.7.0.min.js"></script>
</head>

<body>
    <section class="hdl-header">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-2 py-1">
                    <a href="index.php">
                        <img src="public/images/logo3.psd" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
                    <form action="index.php?opt=result" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <button class="input-group-text bg-main" id="basic-addon2" type="submit" name="search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2">
                    <div class="call-login--register border-bottom">
                        <ul class="nav nav-fills py-0 my-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?opt=login">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    0378173109
                                </a>
                            </li>
                            <?php if (isset($_SESSION['name'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?opt=profile">
                                        <?php echo $_SESSION['name']; ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?opt=customer&logout=true">Đăng xuất</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?opt=customer&login=true">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?opt=customer&register=true">Đăng ký</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="fs-6 py-2">
                        ĐỔI TRẢ HÀNG HOẶC HOÀN TIỀN <span class="text-main">TRONG 3 NGÀY</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2">
                    <a href="index.php?opt=cart">
                        <div class="box-cart float-end">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <span id="showcart">
                                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php require_once "views/sites/mod_mainmenu.php" ?>
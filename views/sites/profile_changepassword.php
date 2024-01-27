<?php

$title = 'Đổi Mật Khẩu';

use App\Models\User;

$users = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();

if (isset($_POST['CHANEGPASSWORD'])) {

   $user = User::find($_SESSION['user_id']);
   if ($user) {
      $password_old = $_POST['password_old'];
      $password_new = $_POST['password_new'];
      $password_re = $_POST['password_re'];

      if (sha1($password_old) == $users->password) {
         if ($password_new != $password_re) {
            echo "<script> alert('Mật Khẩu Mới Không Khớp'); </script>";
         } else {
            $user->password = sha1($password_new);
            $user->save();
            echo "<script> alert('Đổi mật khẩu thành công'); </script>";
         }
      } else {
         echo "<script> alert('Mật Khẩu Cũ Không Đúng'); </script>";
      }
   }
}

?>


<?php require_once "views/sites/header.php"; ?>

<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="call-login--register border-bottom">
            <ul class="nav nav-fills py-0 my-0">
               <li class="nav-item">
                  <a class="nav-link" href="index.php?opt=login">
                     <i class="fa fa-phone-square" aria-hidden="true"></i>
                     0987654321
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?opt=login">Đăng nhập</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?opt=register">Đăng ký</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?opt=profile"><?= $users->name; ?></a>
               </li>
            </ul>
         </div>
         <form action="index.php?opt=profile_changepassword" method="post">
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Mật khẩu cũ</td>
                     <td>
                        <input type="password" name="password_old" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Mật khẩu Mới</td>
                     <td>
                        <input type="password" name="password_new" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Xác nhận mật khẩu</td>
                     <td>
                        <input type="password" name="password_re" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                           Đổi mật khẩu
                        </button>
                     </td>
                  </tr>
               </table>
            </div>
         </form>
      </div>
   </div>
</section>

<?php require_once "views/sites/footer.php"; ?>
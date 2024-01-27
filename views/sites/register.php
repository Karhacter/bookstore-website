<?php

use App\Models\User;

$title = 'Đăng kí';

if (isset($_POST['REGISTER'])) {
   $user = new User();
   $user->name = $_POST['name'];
   $user->phone = $_POST['phone'];
   $user->address = $_POST["address"];
   $user->gender = $_POST['gender'];
   $user->username = $_POST["username"];
   $user->email = $_POST['email'];
   $user->roles = 2;
   $user->created_at = date('Y-m-d H:i:s');
   $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
   $user->status = 1;
   $user->password = sha1($_POST['password']);
   $re_password = sha1($_POST['re_password']);
   if ($user->password != $re_password) {
      echo "<script> alert('Mật Khẩu Không Khớp'); </script>";
   } else {
      $user->save();
      echo "<script> alert('Đăng ký thành công'); </script>";
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
            <li class="breadcrumb-item active" aria-current="page">
               Đăng ký tài khoản
            </li>
         </ol>
      </nav>
   </div>
</section>
<form action="index.php?opt=register" method="post">
   <section class="hdl-maincontent py-2">
      <div class="container">
         <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên(*)</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại(*)</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3">
                  <label for="address">Địa chỉ</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
               </div>
               <div class="mb-3">
                  <label class="text-main">Giới tính</label>
                  <select name="gender" id="gender" class="form-select">
                     <option>Chọn giới tinh</option>
                     <option value="1">Nam</option>
                     <option value="0">Nữ</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản(*)</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email(*)</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu(*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <label for="re_password" class="text-main">Xác nhận Mật khẩu(*)</label>
                  <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
               </div>
               <div class="mb-3">
                  <button type="submit" class="btn btn-main" name="REGISTER">Đăng ký</button>
               </div>
               <?php echo $error ?? ""; ?>
            </div>
         </div>
      </div>
</form>
</section>

<?php require_once "views/sites/footer.php"; ?>
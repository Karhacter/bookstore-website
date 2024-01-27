<?php

use App\Models\User;

$title = 'Đăng nhập';

if (isset($_POST['LOGIN'])) {
   $username = $_POST['username'];
   $password = sha1($_POST['password']);
   $args = [
      ['password', '=', $password],
      ['status', '=', 1]
   ];
   if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $args[] = ['email', '=', $username];
   } else {
      $args[] = ['username', '=', $username];
   }
   $user = User::where($args)->first();
   if ($user !== null) {
      $_SESSION['iscustom'] = $username;
      $_SESSION['user_id'] = $user->id;
      $_SESSION['name'] = $user->name;
      header('location:index.php');
   } else {
      $error = "Tài khoản không hợp lệ";
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
               Đăng nhập
            </li>
         </ol>
      </nav>
   </div>
</section>


<section class="hdl-maincontent py-2">
   <form action="index.php?opt=login" method="post" name="logincustomer">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản (*)</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu (*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main" name="LOGIN">Đăng nhập</button>
               </div>
               <p><u class="text-main">Chú ý</u>: (*) Thông tin bắt buộc phải nhập</p>
               <?php echo $error ?? ""; ?>
            </div>
         </div>
      </div>
   </form>
</section>
<?php require_once "views/sites/footer.php" ?>
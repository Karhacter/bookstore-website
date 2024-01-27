<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <title>Đăng nhập quản trị</title>
   <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
   <link rel="stylesheet" href="login-css/bootstrap-login-form.min.css" />
</head>

<style>
   .gradient-custom {
      background: black;
      /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
   }
</style>

<body>
   <?php
   require_once "../vendor/autoload.php";

   use App\Models\User;

   $error = "";
   if (isset($_POST['DANGNHAP'])) {
      $username = $_POST['username'];
      $password = sha1($_POST['password']);
      $args = [
         ['password', '=', $password],
         ['roles', '=', 1],
         ['status', '=', 1]
      ];
      if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
         $args[] = ['email', '=', $username];
      } else {
         $args[] = ['username', '=', $username];
      }
      $user = User::where($args)->first();
      if ($user !== null) {
         $_SESSION['useradmin'] = $username;
         $_SESSION['user_id'] = $user->id;
         $_SESSION['name'] = $user->name;
         $_SESSION['image'] = $user->image;
         header('location:index.php');
      } else {
         $error = "Tài khoản không hợp lệ";
      }
   }
   ?>
   <form action="login.php" method="post">
      <section class="vh-100 gradient-custom">
         <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-light text-black" style="border-radius: 1rem;">
                     <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                           <h2 class="fw-bold mb-2 text-uppercase">ĐĂNG NHẬP</h2>
                           <div class="mb-3">
                              <p class="text-danger-50 mb-5">Chú ý:(*) Bắt buộc phải điền thông tin</p>
                              <?php if ($error != "") : ?>
                                 <p class="text-danger"><?= $error ?></p>
                              <?php endif; ?>
                           </div>
                           <div class="form-outline form-black mb-4">
                              <input type="text" class="form-control form-control-lg" name="username" />
                              <label class="form-label" for="typeEmailX">Tên đăng nhập hoặc Email</label>
                           </div>
                           <div class="form-outline form-black mb-4">
                              <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                              <label class="form-label" for="typePasswordX">Mật khẩu</label>
                           </div>
                           <br>
                           <button class="btn btn-outline-black btn-lg px-5" type="submit" name="DANGNHAP">Đăng nhập</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </form>

   <script type="text/javascript" src="login-css/mdb.min.js"></script>
   <script type="text/javascript"></script>
</body>

</html>
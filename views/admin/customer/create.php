<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thêm thành viên</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <button class="btn btn-success btn-sm" name="THEM">
               <i class="fa fa-save"></i> Lưu [Thêm]
            </button>
            <a href="index.php?opt=customer" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label><strong>Tên đăng nhập(*)</strong></label>
                  <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" />
               </div>
               <div class="mb-3">
                  <label><strong>Mật khẩu(*)</strong></label>
                  <input type="password" name="password" class="form-control" placeholder="Mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận mật khẩu(*)</strong></label>
                  <input type="password" name="re_password" class="form-control" placeholder="Xác nhận mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Email(*)</strong></label>
                  <input type="text" name="email" class="form-control" placeholder="Email" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận email(*)</strong></label>
                  <input type="text" name="re_email" class="form-control" placeholder="Xác nhận email" />
               </div>
               <div class="mb-3">
                  <label><strong>Điện thoại(*)</strong></label>
                  <input type="text" name="phone" class="form-control" placeholder="Điện thoại" />
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label><strong>Họ tên (*)</strong></label>
                  <input type="text" name="name" class="form-control" placeholder="Họ tên" />
               </div>
               <div class="mb-3">
                  <label><strong>Giới tính</strong></label>
                  <select name="gender" id="gender" class="form-select">
                     <option>Chọn giới tinh</option>
                     <option value="1">Nam</option>
                     <option value="0">Nữ</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Địa chỉ</strong></label>
                  <input type="text" name="address" class="form-control" placeholder="Địa chỉ" />
               </div>
               <div class="mb-3">
                  <label><strong>Hình đại diện</strong></label>
                  <input type="file" name="image" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-select">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
            </div>
         </div>
      </form>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
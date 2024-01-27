<?php

use App\Models\Banner;

$banner =  Banner::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thêm banner</h1>
      <div class="text-end">
         <a href="index.php?opt=banner" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-9">
            <form action="index.php?opt=banner&cat=process" method="post" enctype="multipart/form-data">

               <div class="mb-3">
                  <label><strong>Tên banner (*)</strong></label>
                  <input type="text" name="name" class="form-control" placeholder="Nhập tên banner" />
               </div>
               <div class="mb-3">
                  <label><strong>Liên kết</strong></label>
                  <input type="text" name="link" class="form-control" placeholder="Nhập liên kết" />
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="5" class="form-control" placeholder="Nhập mô tả"></textarea>
               </div>
         </div>
         <div class="col-md-3">
            <div class="box-container mt-4 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Đăng</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <p>Chọn trạng thái đăng</p>
                  <select name="status" class="form-select">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="box-footer text-end px-2 py-3">
                  <button type="submit" class="btn btn-success btn-sm text-end" name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i> Đăng
                  </button>
               </div>
            </div>
            <div class="box-container mt-4 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Vị trí (*)</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <select name="position" class="form-select">
                     <option>Chọn vị trí</option>
                     <option value="slideshow">Slide Show</option>
                     <option value="ads">Quảng cáo</option>
                  </select>
                  <p class="pt-2">Vị trí hiển thị banner</p>
               </div>
            </div>
            <div class="box-container mt-4 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Hình (*)</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <input type="file" name="image" class="form-control" />
               </div>
            </div>
         </div>
         </form>
      </div>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
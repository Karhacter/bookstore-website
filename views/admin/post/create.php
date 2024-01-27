<?php

use App\Models\Post;
use App\Models\Topic;

//post
$posts = Post::where('status', '!=', 0)
   ->orderBy('created_at',)->get();

//topic
$topics = Topic::where('status', '!=', 0)->orderBy('created_at',)->get();
$str_sort_order = "";
foreach ($topics as $item) {
   $str_sort_order .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
}
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thêm bài viết</h1>
      <div class="text-end">
         <a href="index.php?opt=post" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-9">
            <form action="index.php?opt=post&cat=process" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea name="detail" rows="7" class="form-control" placeholder="Nhập chi tiết"></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="4" class="form-control" placeholder="Mô tả"></textarea>
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
                     <i class="fa fa-save" aria-hidden="true" name="THEM"></i> Đăng
                  </button>
               </div>

            </div>
            <div class="box-container mt-2 bg-white">
               <div class="box-body p-2 border-bottom">
                  <label><strong>Sắp xếp</strong></label>
                  <select name="sort_order" class="form-select">
                     <option value="0">Chọn vị trí</option>
                     <?= $str_sort_order; ?>
                  </select>
               </div>
            </div>
            <div class="box-container mt-2 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Hình đại diện</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <input type="file" name="image" class="form-control" />
               </div>
            </div>
         </div>
      </div>
      </form>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
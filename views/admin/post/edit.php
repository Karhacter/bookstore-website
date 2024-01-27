<?php

use App\Models\Post;
use App\Models\Topic;

//post
$id = $_REQUEST['id'];
$posts = Post::where('id', '=', $id)->first();
if ($posts == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header('location:index.php?opt=posts');
}
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
      <h1 class="d-inline">Cập nhật bài viết</h1>
      <div class="text-end">
         <a href="index.php?opt=post" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <form action="index.php?opt=post&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-body my-2">
         <input name="id" value="<?= $posts->id; ?>" type="hidden">
         <div class="row">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input type="text" name="title" value="<?= $posts->title ?>" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Slug (*)</strong></label>
                  <input type="text" name="slug" value="<?= $posts->slug ?>" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea name="detail" rows="7" class="form-control"><?= $posts->detail ?></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="4" class="form-control"><?= $posts->description ?></textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Đăng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <p>Chọn trạng thái đăng</p>
                     <select name="status" class="form-control">
                        <option value="1" <?= $posts->status == 1  ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= $posts->status == 2  ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chủ đề (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="topic_id" class="form-select">
                        <?= $str_sort_order; ?>
                     </select>
                  </div>
               </div>
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Kiểu: (*)</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <select name="type" class="form-select">
                     <option value="">None</option>
                     <option value="post">Post</option>
                     <option value="page">Page</option>
                  </select>
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
   </form>
</div>

</section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topics = Topic::where('id', '=', $id)->first();
if ($topics == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header('location:index.php?opt=post');
}
$topic = Topic::where('status', '!=', '0')->orderBy('created_at',)->get();

$str_sort_order = "";
foreach ($topic as $item) {
   if ($topics->sort_order - 1 == $item->sort_order) {
      $str_sort_order .= "<option selected value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
   } else {
      $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
   }
}

?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật chủ đề</h1>
      <div class="text-end">
         <a class="btn btn-sm btn-primary" href="index.php?opt=topic">Về danh sách</a>
      </div>
   </section>
   <form action="index.php?opt=topic&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-body my-2">
         <input name="id" value="<?= $topics->id; ?>" type="hidden">
         <div class="row">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tên chủ đề (*)</strong></label>
                  <input type="text" name="name" id="name" value="<?= $topics->name ?>" class="form-control" required />
               </div>
               <div class="mb-3">
                  <label><strong>Slug</strong></label>
                  <input type="text" name="slug" id="slug" value="<?= $topics->slug ?>" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả</strong></label>
                  <textarea name="description" rows="6" class="form-control"><?= $topics->name ?></textarea>
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
                        <option value="1" <?= $topics->status == 1  ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= $topics->status == 2  ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Đăng
                     </button>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Thứ tự</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="sort_order" class="form-select">
                        <?= $str_sort_order ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </form>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
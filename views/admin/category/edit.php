<?php

use App\Models\Category;

$id = $_REQUEST["id"];
$category = Category::where('id', '=', $id)->first();
if ($category == null) {
   set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
   header('location: index.php?option=category');
}

$categorys = Category::where('status', '!=', '0')->get();
$str_parent_id = '';
$str_sort_order = '';
foreach ($categorys as $item) {
   if ($item->id != $id) {
      if ($category->parent_id == $item->id) {
         $str_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name .  "</option>";
      } else {
         $str_parent_id .= "<option value='" . $item->id . "'>" . $item->name .  "</option>";
      }
      if ($category->sort_order - 1 == $item->sort_order) {
         $str_sort_order .= "<option selected value='" . $item->sort_order . "'>" . $item->name .  "</option>";
      } else {
         $str_sort_order .= "<option value='" . $item->sort_order . "'>" . $item->name .  "</option>";
      }
   }
}
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật danh mục</h1>
      <div class="text-end">
         <a href="index.php?opt=category" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i>Về danh sách
         </a>
      </div>
   </section>
   <form action="index.php?opt=category&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-body my-2">
         <input name="id" value="<?= $category->id; ?>" type="hidden">
         <div class="row">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tên danh mục (*)</strong></label>
                  <input type="text" name="name" id="name" value="<?= $category->name ?>" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label><strong>Slug</strong></label>
                  <input type="text" name="slug" id="slug" value="<?= $category->slug ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả</strong></label>
                  <textarea name="description" rows="7" class="form-control"><?= $category->description ?></textarea>
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
                        <option value="1" <?= $category->status == 1  ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= $category->status == 2  ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Câp nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Danh mục cha (*)</strong>
                  </div>
                  <div class="box-body p-2">
                     <select name="parent_id" class="form-control">
                        <?= $str_parent_id; ?>
                     </select>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Thứ tự</strong>
                  </div>
                  <div class="box-body p-2">
                     <select name="sort_order" class="form-control">
                        <?= $str_sort_order; ?>
                     </select>
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
         </div>
      </section>
   </form>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
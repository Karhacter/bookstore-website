<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::where('id', '=', $id)->first();
if ($brand == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header('location:index.php?opt=brand');
}

$brands = Brand::where('status', '!=', 0)
   ->orderBy('created_at',)->get();

$str_sort_order = "";

foreach ($brands as $item) {
   if ($item->sort_order == $brand->sort_order - 1) {
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
      <h1 class="d-inline">Cập nhật thương hiệu</h1>
      <div class="text-end">
         <a href="index.php?opt=brand" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <form action="index.php?opt=brand&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-body my-2">
         <input name="id" value="<?= $brand->id; ?>" type="hidden">
         <div class="row">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tên thương hiệu (*)</strong></label>
                  <input type="text" name="name" value="<?= $brand->name; ?>" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label><strong>Slug</strong></label>
                  <input type="text" name="slug" value="<?= $brand->slug; ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả</strong></label>
                  <textarea name="description" class="form-control"><?= $brand->description; ?></textarea>
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
                        <option value="1" <?= $brand->status == 1  ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= $brand->status == 2  ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-sm btn-success" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Hình đại diện</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <input type="file" name="image" class="form-control">
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Thứ tự</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="sort_order" class="form-select">
                        <option value="0">Chọn vị trí</option>
                        <?= $str_sort_order; ?>
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
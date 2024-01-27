<?php


use App\Models\Topic;

$topics = Topic::where('status', '!=', 0)
   ->orderBy('created_at',)->get();

$str_sort_order = "";
foreach ($topics as $item) {
   $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
}
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chủ đề bài viết</h1>
      <hr style="border: none;" />
   </section>
   <form action="index.php?opt=topic&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-body my-2">
         <div class="row">
            <div class="col-md-4">
               <div class="mb-3">
                  <label><strong>Tên chủ đề (*)</strong></label>
                  <input type="text" name="name" class="form-control" placeholder="Tên chủ để">
               </div>
               <div class="mb-3">
                  <label><strong><strong>Mô tả</strong></strong></label>
                  <textarea name="description" rows="6" class="form-control" placeholder="Mô tả"></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Sắp xếp</strong></label>
                  <select name="sort_order" class="form-select">
                     <option value="0">Chọn vị trí</option>
                     <?= $str_sort_order; ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-control">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3 text-end">
                  <button class="btn btn-sm btn-success" type="submit" name="THEM">
                     <i class="fa fa-save"></i> Lưu[Cập nhật]
                  </button>
               </div>
            </div>
            <div class="col-md-8">
               <div class="row mt-3 align-items-center">
                  <div class="col-12">
                     <ul class="manager">
                        <li><a href="index.php?opt=topic">Tất cả (123)</a></li>
                        <li><a href="#">Xuất bản (12)</a></li>
                        <li><a href="index.php?opt=topic&cat=trash">Rác (12)</a></li>
                     </ul>
                  </div>
               </div>
               <div class="row my-2 align-items-center">
                  <div class="col-md-6">
                     <select name="" class="d-inline me-1">
                        <option value="">Hành động</option>
                        <option value="">Bỏ vào thùng rác</option>
                     </select>
                     <button class="btnapply">Áp dụng</button>
                  </div>
                  <div class="col-md-6 text-end">
                     <input type="text" class="search d-inline" />
                     <button class="d-inline">Tìm kiếm</button>
                  </div>
               </div>
               <?php require_once "../views/admin/message.php"; ?>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th>Tên chủ đề</th>
                        <th>Tên slug</th>
                        <th class="text-center" style="width:30px;">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($topics as $topic) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox" id="checkId" />
                           </td>
                           <td>
                              <div class="name">
                                 <a href="index.php?opt=topic&cat=edit">
                                    <?= $topic->name; ?>
                                 </a>
                              </div>
                              <div class="function_style">
                                 <?php if ($topic->status == 1) : ?>
                                    <a href="index.php?opt=topic&cat=status&id=<?= $topic->id; ?>" class="btn btn-sm btn-success btn-xs">
                                       <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?opt=topic&cat=status&id=<?= $topic->id; ?>" class="btn btn-sm btn-danger btn-xs">
                                       <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?opt=topic&cat=edit&id=<?= $topic->id; ?>" class="btn btn-sm btn-primary btn-xs">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                 </a>
                                 <a href="index.php?opt=topic&cat=show&id=<?= $topic->id; ?>" class="btn btn-sm btn-info btn-xs">
                                    <i class="fa fa-eye"></i> chi tiết
                                 </a>
                                 <a href="index.php?opt=topic&cat=delete&id=<?= $topic->id; ?>" class="btn btn-sm btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> xóa
                                 </a>
                              </div>
                           </td>
                           <td><?= $topic->slug ?></td>
                           <td class="text-center"><?= $topic->id ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </form>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
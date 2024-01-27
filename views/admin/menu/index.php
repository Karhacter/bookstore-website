<?php

use App\Models\Menu;

$menus =  Menu::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Quản lý menu</h1>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li><a href="index.php?opt=menu">Tất cả (123)</a></li>
               <li><a href="#">Xuất bản (12)</a></li>
               <li><a href="index.php?opt=menu&cat=trash">Rác (12)</a></li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-3">
            <ul class="list-group">
               <li class="list-group-item mb-2">
                  <select name="postion" class="form-control">
                     <option value="mainmenu">Main Menu</option>
                     <option value="footermenu">Footer Menu</option>
                  </select>
               </li>
               <li class="list-group-item mb-2 border">
                  <a class="d-block" href="#multiCollapseCategory" data-bs-toggle="collapse">
                     Danh mục sản phẩm
                  </a>
                  <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCategory">
                     <div class="form-check">
                        <input name="categoryid[]" class="form-check-input" type="checkbox" value="" id="categoryid" />
                        <label class="form-check-label" for="categoryid">
                           Default checkbox
                        </label>
                     </div>
                     <div class="my-3">
                        <button name="ADDCATEGORY" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                     </div>
                  </div>
               </li>
               <li class="list-group-item mb-2 border">
                  <a class="d-block" href="#multiCollapsemenu" data-bs-toggle="collapse">
                     Thương hiệu
                  </a>
                  <div class="collapse multi-collapse border-top mt-2" id="multiCollapsemenu">
                     <div class="form-check">
                        <input name="menuid[]" class="form-check-input" type="checkbox" value="" id="menuid" />
                        <label class="form-check-label" for="menuid">
                           Default checkbox
                        </label>
                     </div>
                     <div class="my-3">
                        <button name="ADDmenu" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                     </div>
                  </div>
               </li>
               <li class="list-group-item mb-2 border">
                  <a class="d-block" href="#multiCollapseTopic" data-bs-toggle="collapse">
                     Chủ đề bài viết
                  </a>
                  <div class="collapse multi-collapse border-top mt-2" id="multiCollapseTopic">
                     <div class="form-check">
                        <input name="topicid[]" class="form-check-input" type="checkbox" value="" id="topicid" />
                        <label class="form-check-label" for="topicid">
                           Default checkbox
                        </label>
                     </div>
                     <div class="my-3">
                        <button name="ADDTOPIC" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                     </div>
                  </div>
               </li>
               <li class="list-group-item mb-2 border">
                  <a class="d-block" href="#multiCollapsePage" data-bs-toggle="collapse">
                     Trang đơn
                  </a>
                  <div class="collapse multi-collapse border-top mt-2" id="multiCollapsePage">
                     <div class="form-check">
                        <input name="pageid[]" class="form-check-input" type="checkbox" value="" id="pageid" />
                        <label class="form-check-label" for="pageid">
                           Default checkbox
                        </label>
                     </div>
                     <div class="my-3">
                        <button name="ADDPAGE" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                     </div>
                  </div>
               </li>
               <li class="list-group-item mb-2 border">
                  <a class="d-block" href="#multiCollapseCustom" data-bs-toggle="collapse">
                     Tùy biến liên kết
                  </a>
                  <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCustom">
                     <div class="mb-3">
                        <label>Tên menu</label>
                        <input type="text" name="name" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label>Liên kết</label>
                        <input type="text" name="link" class="form-control" />
                     </div>
                     <div class="my-3">
                        <button name="ADDCUSTOM" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="col-md-9">
            <div class="row mt-1 align-items-center">
               <div class="col-md-8">
                  <select name="" class="d-inline me-1">
                     <option value="">Hành động</option>
                     <option value="">Bỏ vào thùng rác</option>
                  </select>
                  <button class="btnapply">Áp dụng</button>
               </div>
               <div class="col-md-4 text-end">
                  <nav aria-label="Page navigation example">
                     <ul class="pagination pagination-sm justify-content-end">
                        <li class="page-item disabled">
                           <a class="page-link">&laquo;</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">&raquo;</a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <?php require_once "../views/admin/message.php"; ?>

            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox" id="checkboxAll" />
                     </th>
                     <th>Tên menu</th>
                     <th>Liên kết</th>
                     <th>Vị trí</th>
                     <th class="text-center" style="width:30px;">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($menus as $menu) : ?>
                     <tr class="datarow">
                        <td class="text-center">
                           <input type="checkbox" />
                        </td>
                        <td>
                           <img class="img-fluid" src="../public/images/menu/<?= $menu->image; ?>" alt="<?= $menu->image; ?>">
                        </td>
                        <td>
                           <div class="name">
                              <a href="index.php?opt=menu&cat=edit&id=<?= $menu->id; ?>">
                                 <?php echo $menu->name; ?>
                              </a>
                           </div>
                           <div class="function_style">
                              <?php if ($menu->status == 1) : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id; ?>" class="btn btn-sm btn-success btn-xs">
                                    <i class="fa fa-toggle-on"></i> hiện
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id; ?>" class="btn btn-sm btn-danger btn-xs">
                                    <i class="fa fa-toggle-off"></i> ẩn
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?opt=menu&cat=edit&id=<?= $menu->id; ?>" class="btn btn-sm btn-primary btn-xs">
                                 <i class="fa fa-edit"></i> chỉnh sửa
                              </a>
                              <a href="index.php?opt=menu&cat=show&id=<?= $menu->id; ?>" class="btn btn-sm btn-info btn-xs">
                                 <i class="fa fa-eye"></i> chi tiết
                              </a>
                              <a href="index.php?opt=menu&cat=delete&id=<?= $menu->id; ?>" class="btn btn-sm btn-danger btn-xs">
                                 <i class="fa fa-trash"></i> xóa
                              </a>
                           </div>
                        </td>
                        <td><?php echo $menu->slug; ?></td>
                        <td class="text-center"><?php echo $menu->id; ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php

use App\Models\Order;

$orders = Order::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>


<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Quản lý đơn hàng</h1>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li><a href="#">Tất cả (123)</a></li>
               <li><a href="#">Xuất bản (12)</a></li>
               <li><a href="index.php?opt=order&cat=trash">Rác (12)</a></li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
      <div class="row mt-1 align-items-center">
         <div class="col-md-8">
            <select name="" class="d-inline me-1">
               <option value="">Hành động</option>
               <option value="">Bỏ vào thùng rác</option>
            </select>
            <button class="btnapply">Áp dụng</button>
            <select name="" class="d-inline me-1">
               <option value="">Chọn tháng</option>
               <option value="">Tháng 9</option>
            </select>
            <select name="" class="d-inline me-1">
               <option value="">Chọn năm</option>
            </select>
            <button class="btnfilter">Lọc</button>
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
   </section>
   <section class="content-body my-2">
      <?php require_once "../views/admin/message.php"; ?>

      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th>Họ tên khách hàng</th>
               <th>Điện thoại</th>
               <th>Email</th>
               <th>Ngày đặt hàng</th>
               <th class="text-center" style="width:30px;">ID</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($orders as $order) : ?>
               <tr class="datarow">
                  <td>
                     <input type="checkbox" id="checkId" />
                  </td>
                  <td>
                     <div class="name">
                        <a href="index.php?opt=order&cat=show">
                           <?= $order->deliveryname; ?>
                        </a>
                     </div>
                     <div class="function_style">
                        <?php if ($order->status == 1) : ?>
                           <a href="index.php?opt=order&cat=status&id=<?= $order->id; ?>" class="btn btn-sm btn-success btn-xs">
                              <i class="fa fa-toggle-on"></i> hiện
                           </a>
                        <?php else : ?>
                           <a href="index.php?opt=order&cat=status&id=<?= $order->id; ?>" class="btn btn-sm btn-danger btn-xs">
                              <i class="fa fa-toggle-off"></i> ẩn
                           </a>
                        <?php endif; ?>
                        <a href="index.php?opt=order&cat=show&id=<?= $order->id; ?>" class="btn btn-sm btn-info btn-xs">
                           <i class="fa fa-eye"></i> chi tiết
                        </a>
                        <a href="index.php?opt=order&cat=delete&id=<?= $order->id; ?>" class="btn btn-sm btn-danger btn-xs">
                           <i class="fa fa-trash"></i> xóa
                        </a>
                     </div>
                  </td>
                  <td><?= $order->deliveryphone; ?></td>
                  <td><?= $order->deliveryemail; ?></td>
                  <td><?= $order->created_at; ?></td>
                  <td class="text-center"><?= $order->id; ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Nhập sản phẩm</h1>
      <div class="row mt-3 align-items-center">
         <div class="col-12 text-end">
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
               <option value="">Tất cả danh mục</option>
            </select>
            <select name="" class="d-inline me-1">
               <option value="">Tất cả thương hiệu</option>
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

      <table class="table table-bordered table-striped">
         <thead>
            <tr>
               <th class="text-center" style="width:90px;">Hình ảnh</th>
               <th>Tên sản phẩm</th>
               <th>Tên danh mục</th>
               <th>Tên thương hiệu</th>
               <th style="width:90px;" class="text-center">Số lượng</th>
               <th style="width:180px;" class="text-center">Giá nhập</th>
               <th style="width:60px;"></th>
            </tr>
         </thead>
         <tbody>
            <tr class="datarow">
               <td>
                  <img class="img-fluid" src="" alt="">
               </td>
               <td>Ten SP</td>
               <td>sadsa</td>
               <td>ádsa</td>
               <td>
                  <input type="number" name="qty" style="width:90px;" />
               </td>
               <td>
                  <input type="number" name="price" style="width:180px;" />
               </td>
               <td class="text-center">
                  <button type="button" onclick="selectproduct(1)" class="btn btn-sm btn-success">Lưu</button>
               </td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Khuyến mãi</h1>
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

      <table class="table table-bordered" id="mytable2">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th class="text-center" style="width:90px;">Hình ảnh</th>
               <th>Tên sản phẩm</th>
               <th>Giá bán</th>
               <th>Ngày BĐ</th>
               <th>Ngày kết thúc</th>
               <th>Giá sale</th>
            </tr>
         </thead>
         <tbody>
            <tr class="datarow">
               <td class="text-center">
                  <input type="checkbox" id="checkId" />
               </td>
               <td>
                  <img style="width:90px;" src="hinh" alt="hh" />
               </td>
               <td>
                  <div class="name">
                     Tên sản phẩm
                  </div>
                  <div class="function_style">
                     <a class="mx-1 text-success" href="#">
                        <i class="fas fa-toggle-on"></i>
                     </a>
                     <a class="mx-1 text-primary" href="#">
                        <i class="fas fa-edit"></i>
                     </a>
                     <a class="mx-1 text-info" href="#">
                        <i class="fas fa-eye"></i>
                     </a>
                     <a class="mx-1 text-danger" href="#">
                        <i class="fas fa-trash"></i>
                     </a>
                  </div>
               </td>
               <td>324343</td>
               <td>ngày bd</td>
               <td>jjjj</td>
               <td>2321</td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php

use App\Models\Contact;

$contacts = Contact::all();
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Liên hệ</h1>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li><a href="index.php?opt=contact">Tất cả (123)</a></li>
               <li><a href="#">Xuất bản (12)</a></li>
               <li><a href="index.php?opt=contact&cat=trash">Rác (12)</a></li>
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

      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th>Họ tên</th>
               <th>Điện thoại</th>
               <th>Email</th>
               <th>Tiêu đề</th>
               <th class="text-center" style="width:30px;">ID</th>
            </tr>
         </thead>
         <tbody>
            <tr class="datarow">
               <td class="text-center">
                  <input type="checkbox" id="checkId" />
               </td>
               <td>
                  <div class="name">
                     <a href="index.php?opt=contact&cat=replay">Trần Đức Khánh</a>
                  </div>
                  <div class="function_style">
                     <a href="#" class="text-success mx-1">
                        <i class="fa fa-toggle-on"></i>
                     </a>
                     <a href="index.php?opt=contact&cat=replay" class="text-primary mx-1">
                        <i class="fa fa-edit"></i> Trả lời
                     </a>
                     <a href="index.php?opt=contact&cat=show" class="text-info mx-1">
                        <i class="fa fa-eye"></i>
                     </a>
                     <a href="#" class="text-danger mx-1">
                        <i class="fa fa-trash"></i>
                     </a>
                  </div>
               </td>
               <td>098765432</td>
               <td>dienloisoft@gmail.com</td>
               <td>Tieu đề</td>
               <td class="text-center">1</td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
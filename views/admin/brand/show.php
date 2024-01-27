<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brands = Brand::where('id', '=', $id)->get();
?>


<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <?php foreach ($brands as $brand) : ?>
      <section class="content-header my-2">
         <h1 class="d-inline">Chi tiết</h1>
         <div class="row mt-2 align-items-center">
            <div class="col-md-12 text-end">
               <a href="index.php?opt=brand" class="btn btn-primary btn-sm">
                  <i class="fa fa-arrow-left"></i> Về danh sách
               </a>
               <a href="index.php?opt=brand&cat=edit&id=<?= $brand->id ?>" class="btn btn-success btn-sm">
                  <i class="fa fa-edit"></i> Sửa
               </a>
               <a href="index.php?opt=brand&cat=delete&id=<?= $brand->id; ?>" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i> Xóa
               </a>
            </div>
         </div>
      </section>

      <section class="content-body my-2">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th style="width:180px">Tên trường</th>
                  <th>Giá trị</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>
                     Id <br>
                     Name <br>
                     Description
                  </td>
                  <td>
                     <?= $brand->id; ?> <br>
                     <?= $brand->name; ?> <br>
                     <?= $brand->description; ?>
                  </td>
               </tr>
            </tbody>
         </table>
      </section>
   <?php endforeach; ?>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
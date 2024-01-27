<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cấu hình website</h1>
   </section>
   <section class="content-body my-3">

      <form action="" method="post">
         <input type="hidden" name="id" value="">
         <div class="mb-3">
            <label for="author"><strong>Tác giả(*)</strong></label>
            <input type="text" name="author" value="" id="author" class="form-control" />
         </div>
         <div class="mb-3">
            <label for="email"><strong>Email(*)</strong></label>
            <input type="text" name="email" value="" id="email" class="form-control" />
         </div>
         <div class="mb-3">
            <label for="phone"><strong>Điện thoại(*)</strong></label>
            <input type="text" name="phone" value="" id="phone" class="form-control" />
         </div>
         <div class="mb-3">
            <label for="zalo"><strong>Zalo(*)</strong></label>
            <input type="text" name="zalo" value="" id="zalo" class="form-control" />
         </div>

         <div class="mb-3">
            <label for="facebook"><strong>Facebook cá nhân(*)</strong></label>
            <input type="text" name="facebook" value="" id="facebook" class="form-control" />
         </div>

         <div class="mb-3">
            <label for="address"><strong>Địa chỉ(*)</strong></label>
            <input type="text" name="address" value="" id="address" class="form-control" />
         </div>

         <div class="mb-3">
            <label for="youtube"><strong>Kênh Youtube(*)</strong></label>
            <input type="text" name="youtube" value="" id="youtube" class="form-control" />
         </div>

         <div class="mb-3">
            <label for="metadesc"><strong>Mô tả seo(*)</strong></label>
            <textarea name="metadesc" id="metadesc" class="form-control"></textarea>
         </div>
         <div class="mb-3">
            <label for="metakey"><strong>Từ khoa seo(*)</strong></label>
            <textarea name="metakey" id="metakey" class="form-control"></textarea>
         </div>
         <div class="mb-3">
            <label for="status"><strong>Trạng thái</strong></label>
            <select name="status" id="status" class="form-control">
               <option value="1">Online
               </option>
               <option value="2">Offline
               </option>
            </select>
         </div>
         <div class="mb-3">
            <button type="submit" class="btn btn-success">
               <i class="fa fa-save" aria-hidden="true"></i> Lưu cấu hình
            </button>
         </div>
      </form>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Trả lời liên hệ</h1>
      <div class="text-end">
         <a href="index.php?opt=contact" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
         <button type="submit" class="btn btn-success btn-sm text-end">
            <i class="fa fa-save" aria-hidden="true"></i> Trả lời liên hệ
         </button>
      </div>
   </section>
   <section class="content-body my-2">

      <div class="row">
         <div class="col-4">
            <div class="mb-3">
               <label for="name" class="text-main">Họ tên</label>
               <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" readonly>
            </div>
         </div>
         <div class="col-4">
            <div class="mb-3">
               <label for="phone" class="text-main">Điện thoại</label>
               <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" readonly>
            </div>
         </div>
         <div class="col-4">
            <div class="mb-3">
               <label for="email" class="text-main">Email</label>
               <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email" readonly>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="mb-3">
               <label for="title" class="text-main">Tiêu đề</label>
               <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề" readonly>
            </div>
            <div class="mb-3">
               <label for="content_old" class="text-main">Nội dung</label>
               <textarea name="content_old" id="content_old" class="form-control" placeholder="Nhập nội dung liên hệ" readonly></textarea>
            </div>
            <div class="mb-3">
               <label for="content" class="text-main">Nội dung trả lời</label>
               <textarea name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ" rows="5"></textarea>
            </div>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
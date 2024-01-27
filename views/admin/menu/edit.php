<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật menu</h1>
      <div class="text-end">
         <a href="menu_index.html" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-9">
            <div class="mb-3">
               <label for="name"><strong>Tên menu</strong></label>
               <input value="" type="text" name="name" id="name" class="form-control" />
            </div>
            <div class="mb-3">
               <label for="link"><strong>Liên kết</strong></label>
               <input value="" type="text" name="link" id="link" class="form-control" />
            </div>
            <div class="mb-3">
               <label for="position"><strong>Vị trí</strong></label>
               <select name="position" id="position" class="form-control">
                  <option value="mainmenu">Main
                     Menu</option>
                  <option value="footermenu">Footer Menu</option>
               </select>
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
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="box-footer text-end px-2 py-3">
                  <button type="submit" class="btn btn-success btn-sm text-end">
                     <i class="fa fa-save" aria-hidden="true"></i> Đăng
                  </button>
               </div>
            </div>
            <div class="box-container mt-2 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Cấp cha</strong>
               </div>
               <select name="parent_id" id="parent_id" class="form-control">
                  <option value="0">None</option>
               </select>
            </div>
            <div class="box-container mt-2 bg-white">
               <div class="box-header py-1 px-2 border-bottom">
                  <strong>Thứ tự</strong>
               </div>
               <div class="box-body p-2 border-bottom">
                  <select name="sort_order" class="form-control">
                     <option value="">Sau</option>
                     <option value="2">sau</option>
                  </select>
               </div>
            </div>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>
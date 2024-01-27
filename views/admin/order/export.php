<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tiêu đề giao diện</title>
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/fontawesome/css/all.min.css">

   <link rel="stylesheet" href="public/css/backend.css">
</head>

<body>
   <section class="hdl-header sticky-top">
      <div class="container-fluid">
         <ul class="menutop">
            <li>
               <a href="">
                  <i class="fa-brands fa-dashcube"></i> Shop Thời trang
               </a>
            </li>
            <li class="text-phai">
               <a href="">
                  <i class="fa-solid fa-power-off"></i> Thoát
               </a>
            </li>
            <li class="text-phai">
               <a href="">
                  <i class="fa fa-user" aria-hidden="true"></i> Chào quản lý
               </a>
            </li>
         </ul>
      </div>
   </section>
   <section class="hdl-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-2 bg-dark p-0 hdl-left">
               <div class="hdl-left">
                  <div class="dashboard-name">
                     Bản điều khiển
                  </div>
                  <nav class="m-2 mainmenu">
                     <ul class="main">
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Sản phẩm</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="product_index.html">Tất cả sản phẩm</a>
                              </li>
                              <li>
                                 <a href="product_import.html">Nhập hàng</a>
                              </li>
                              <li>
                                 <a href="category_index.html">Danh mục</a>
                              </li>
                              <li>
                                 <a href="brand_index.html">Thương hiệu</a>
                              </li>
                              <li>
                                 <a href="product_sale.html">Khuyễn mãi</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Bài viết</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="post_index.html">Tất cả bài viết</a>
                              </li>
                              <li>
                                 <a href="topic_index.html">Chủ đề</a>
                              </li>
                              <li>
                                 <a href="page_index.html">Trang đơn</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Quản lý bán hàng</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="order_index.html">Tất cả đơn hàng</a>
                              </li>
                              <li>
                                 <a href="order_export.html">Xuất hàng</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="customer_index.html">Khách hàng</a>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="contact_index.html">Liên hệ</a>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Giao diện</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="menu_index.html">Menu</a>
                              </li>
                              <li>
                                 <a href="banner_index.html">Banner</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Hệ thống</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="user_index.html">Thành viên</a>
                              </li>
                              <li>
                                 <a href="config_index.html">Cấu hình</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-md-10">
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Blank Page</h1>
                     <a href="" class="btn btn-secondary btn-sm">Thêm mới</a>
                     <div class="row mt-3 align-items-center">
                        <div class="col-6">
                           <ul class="manager">
                              <li><a href="#">Tất cả (123)</a></li>
                              <li><a href="#">Xuất bản (12)</a></li>
                              <li><a href="#">Rác (12)</a></li>
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

                     <div class="row">
                        <div class="col-12 my-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#chonkhachhang">
                              Chọn khách hàng
                           </button>
                        </div>
                     </div>
                     <div class="row" id="rowshowcustome">
                        <div class="col-md">
                           <label>Họ tên (*)</label>
                           <input type="text" name="name" class="form-control" readonly />
                        </div>
                        <div class="col-md">
                           <label>Email (*)</label>
                           <input type="text" name="email" class="form-control" readonly />
                        </div>
                        <div class="col-md">
                           <label>Điện thoại (*)</label>
                           <input type="text" name="phone" class="form-control" readonly />
                        </div>
                        <div class="col-md-5">
                           <label>Địa chỉ (*)</label>
                           <input type="text" name="address" class="form-control" readonly />
                        </div>
                        <input type="hidden" name="user_id" />
                     </div>
                     <div class="row my-3">
                        <div class="col-12 my-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#chonsanpham">
                              Chọn sản phẩm
                           </button>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th class="text-center" style="width:140px;">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody id="bodyproduct">
                                 <tr>
                                    <td>
                                       <img class="img-fluid" src="h" alt="h" />
                                    </td>
                                    <td>Hoten</td>
                                    <td>DanhMuc</td>
                                    <td>ThuongHieu</td>
                                    <td>Gia</td>
                                    <td><input style="width:60px" name="qty[]" type="number" min="0" />
                                    </td>
                                    <td>ThanhTine</td>
                                    <td><button class="btn btn-danger btn-xs px-2">X</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                  </section>
               </div>
               <!--END CONTENT-->
            </div>
         </div>
      </div>
   </section>
   <script src="public/jquery/jquery-3.7.0.min.js"></script>

   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="public/js/backend.js"></script>


</body>

</html>
<?php

use App\Libraries\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;

$title = 'Thanh toán';

$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();

$listcart = Cart::getContent('cart');

if (isset($_POST['XACNHAN']) && count($listcart) > 0) {
   $order = new Order();
   $order->user_id = $_SESSION['user_id'];
   $order->deliveryname = $customer->name;
   $order->deliveryemail = $customer->email;
   $order->deliveryphone = $customer->phone;
   $order->deliveryaddress = $customer->address;
   $order->note = "Không chú ý";
   $order->created_at = date('Y-m-d H:i:s');
   $order->status = 1;
   if ($order->save()) {
      foreach ($listcart as $cart) {
         $orderdetail = new Orderdetail();
         $orderdetail->order_id = $order->id;
         $orderdetail->product_id = $cart['id'];
         $orderdetail->price = $cart['price'];
         $orderdetail->qty = $cart['qty'];
         $orderdetail->amount = $cart['price'] * $cart['qty'];
         $orderdetail->save();
      }
      unset($_SESSION['cart']);
      header('location:index.php?opt=cart');
   }
}
?>
<?php require_once "views/sites/header.php"; ?>

<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Thanh toán
            </li>
         </ol>
      </nav>
   </div>
</section>

<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <form action="index.php?opt=checkout" method="post">
               <h2 class="fs-5 text-main">Thông tin giao hàng</h2>
               <p>Bạn có tài khoản chưa? <a href="index.php?opt=customer&login=true">Đăng nhập</a></p>
               <?php if (isset($_SESSION['iscustom'])) : ?>
                  <div class="mb-3">
                     <label for="name">Họ tên</label>
                     <input type="text" name="name" id="name" value="<?= $customer->name; ?>" class="form-control" placeholder="Nhập họ tên" readonly>
                  </div>
                  <div class="mb-3">
                     <label for="phone">Điện thoại</label>
                     <input type="text" name="phone" id="phone" class="form-control" value="<?= $customer->phone; ?>" placeholder="Nhập điện thoại" readonly>
                  </div>
                  <div class="mb-3">
                     <label for="email">Email</label>
                     <input type="text" name="email" id="email" class="form-control" value="<?= $customer->email; ?>" placeholder="Nhập điện thoại" readonly>
                  </div>
                  <div class="mb-3">
                     <label for="address">Địa chỉ</label>
                     <input type="text" name="address" id="address" class="form-control" value="<?= $customer->address; ?>" placeholder="Nhập điện thoại" readonly>
                  </div>
                  <h4 class="fs-6 text-main mt-4">Phương thức thanh toán</h4>
                  <div class="thanhtoan mb-4">
                     <div class="p-4 border">
                        <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio" value="1" id="check1" />
                        <label for="check1">Thanh toán khi giao hàng</label>
                     </div>
                     <div class="p-4 border">
                        <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio" value="2" id="check2" />
                        <label for="check2">Chuyển khoản qua ngân hàng</label>
                     </div>
                     <div class="p-4 border bankinfo">
                        <p>Ngân Hàng Techcombank </p>
                        <p>STK: 10042004004</p>
                        <p>Chủ tài khoản: Trần Đức Khánh</p>
                     </div>
                  </div>
                  <div class="text-end">
                     <button type="submit" class="btn btn-main px-4" name="XACNHAN">XÁC NHẬN</button>
                  </div>
               <?php endif; ?>
            </form>
         </div>
         <script>
            function showbankinfo(value) {
               var elementbank = document.querySelector(".bankinfo");
               if (value == 1) {
                  elementbank.style.display = "none";
               } else {
                  elementbank.style.display = "block";
               }
            }
         </script>
         <div class="col-md-6">
            <h2 class="fs-5 text-main">Thông tin đơn hàng</h2>
            <table class="table table-borderless">
               <thead>
                  <tr class="bg-dark">
                     <th style="width:30px;" class="text-center">STT</th>
                     <th style="width:100px;">Hình</th>
                     <th>Tên sản phẩm</th>
                     <th class="text-center">Giá</th>
                     <th style="width:130px" class='text-center'>Số lượng</th>
                     <th class="text-center">Thành tiền</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($listcart) > 0) : ?>
                     <?php
                     $stt = 1;
                     ?>
                     <?php foreach ($listcart as $cart) : ?>
                        <?php if ($cart['pricesale'] != null) : ?>
                           <?php $money_item = $cart['qty'] * $cart['pricesale']; ?>
                        <?php else : ?>
                           <?php $money_item = $cart['qty'] * $cart['price']; ?>
                        <?php endif; ?>
                        <tr>
                           <td class="text-center align-middle"><?= $stt; ?></td>
                           <td>
                              <img class="img-fluid" src="public/images/product/<?= $cart['image'] ?>" alt="<?= $cart['image'] ?>">
                           </td>
                           <td class="align-middle"><?= $cart['name'] ?></td>
                           <td class="text-center align-middle">
                              <?php if ($cart['pricesale'] != null) : ?>
                                 <?= number_format($cart['pricesale']) ?>
                              <?php else : ?>
                                 <?= number_format($cart['price']) ?>
                              <?php endif; ?>
                           </td>
                           <td class="text-center align-middle">
                              <?= $cart['qty']; ?>
                           </td>
                           <td class="text-center align-middle">
                              <?= number_format($money_item); ?>
                           </td>
                        </tr>
                        <?php $stt++; ?>
                     <?php endforeach ?>
                  <?php else : ?>
                     <tr>
                        <td colspan="7" class="text-center">Chưa có sản phẩm</td>
                     </tr>
                  <?php endif; ?>
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="6" class="text-end">
                        <strong>Tổng tiền: <?= number_format(Cart::getTotalPrice('cart')) . " đ" ?></strong>
                     </td>
                  </tr>
               </tfoot>
            </table>
            <div>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Mã giảm giá" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">Sử dụng</span>
               </div>
            </div>
            <table class="table table-borderless">
               <tr>
                  <th>Tạm tính</th>
                  <td class="text-end"><?= number_format(Cart::getTotalPrice('cart')) . " đ" ?></td>
               </tr>
               <tr>
                  <th>Phí vận chuyển</th>
                  <td class="text-end">0</td>
               </tr>
               <tr>
                  <th>Giảm giá</th>
                  <td class="text-end">0</td>
               </tr>
               <tr>
                  <th>Tổng cộng</th>
                  <td class="text-end"><?= number_format(Cart::getTotalPrice('cart')) . " đ" ?></td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/sites/footer.php" ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>/</li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<?php
addCart($conn);
?>
<!--Checkout page section-->
<div class="Checkout_section" id="accordion">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Bạn là khách hàng cũ?
                        <a href="index.php?page=login"
                           aria-expanded="true">Nhấn vào đây để đăng nhập</a>
                    </h3>
                </div>
                <form method="post">
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                        <h3>Chi tiết hoá đơn</h3>
                        <div class="row">
                            <div class="col-lg-12 mb-20">
                                <label>Họ và Tên <span>*</span></label>
                                <input type="text" name="fullname" required id="fullname">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" name="phone_number" id="phone_number" required>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Địa chỉ Email <span>*</span></label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Địa chỉ <span>*</span></label>
                                <input name="address" id="address" placeholder="Số nhà và tên đường, quận huyện, tỉnh của bạn" required type="text">
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note"
                                              placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <?php
                            $subtotal = 0;
                            $ordertotal = 0;
                            $shipping = 30000;
                            if(isset($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    $subtotal += $value["price"] * $value["quantity"];
                                    $ordertotal = $shipping + $subtotal;
                                }
                            ?>
                            <table>
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    foreach ($_SESSION["cart"] as $key => $value) {
                                    ?>
                                    <td> <?php echo $value["name"]?> <strong> x <?php echo $value["quantity"]?></strong></td>
                                    <td> <?php echo number_format($value["price"] * $value["quantity"],0,",",".")?>Đ</td>
                                </tr>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <th>Phí vận chuyển</th>
                                    <td><?php echo number_format($shipping,0,",",".") ?>Đ<strong></strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Tổng đơn hàng</th>
                                    <td><strong><?php echo number_format($ordertotal,0,",","."); ?>Đ</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                            <?php } ?>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <?php
                                $sqlPay = "SELECT * FROM payment WHERE status = 1";
                                $resultPay = mysqli_query($conn, $sqlPay);
                                if (mysqli_num_rows($resultPay) > 0) {
                                while ($row = mysqli_fetch_assoc($resultPay)) {
                                ?>
                                <input id="payment_defult" value="<?php echo $row["payment_id"] ?>" name="payment[]" id="payment[]" type="radio"
                                       data-target="createp_account" />
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                                       aria-controls="collapsedefult"><?php echo $row["payment_name"] ?></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Thanh toán khi nhận hàng, có thể kiểm hàng trước khi nhận</p>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                            <div class="order_button">
                                <p><button type="submit" name="addNew">Thanh toán</button></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đặt hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Đặt hàng thành công, cảm ơn bạn chúng tôi sẽ giao hàng sớm nhất cho bạn</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bỏ qua</button>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->

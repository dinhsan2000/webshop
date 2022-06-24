<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>/</li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <?php
                                $total = 0;
                                $ship = 30000;
                                if(isset($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $key=>$value) {
                                }
                                ?>
                                <thead>
                                <tr>
                                    <th class="product_remove">Xoá</th>
                                    <th class="product_thumb">Hình ảnh</th>
                                    <th class="product_name">Sản phẩm</th>
                                    <th class="product_name">Kích cỡ</th>
                                    <th class="product_name">Màu sắc</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product_quantity">Số lượng</th>
<!--                                    <th class="product_total">Total</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($_SESSION["cart"] as $key=>$value) {
                                ?>
                                <tr>
                                    <td class="product_remove"><a href="javascrip:void(0)" onclick="deleteCart(<?php echo $key ?>)"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><img src="<?php echo $value["image"] ?>" alt=""></td>
                                    <td class="product_name"><?php echo $value["name"] ?></td>
                                    <td class="product_name"><?php echo $value["size"] ?></td>
                                    <td class="product_name"><?php echo $value["color"] ?></td>
                                    <td class="product-price"><?php echo number_format($value["price"] * $value["quantity"],0,",",".") ?>Đ</td>
                                    <td class="product_quantity">
                                        <input min="1" max="100" onblur="updateCart(<?php echo $key ?>)" name="quantity_<?php echo $key ?>" id="quantity_<?php echo $key ?>" value="<?php echo $value["quantity"]; $total +=$value["price"] * $value["quantity"] ?>" type="text">
                                    </td>
                                    <?php } ?>
<!--                                    <td class="product_total"></td>-->
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="submit" href="index.php?page=category">Tiếp tục mua hàng</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Mã giảm giá</h3>
                            <div class="coupon_inner">
                                <p>Nhập vào mã giảm giá của bạn.</p>
                                <input placeholder="Mã giảm giá" type="text">
                                <button type="submit">Xác nhận mã giảm giá</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Tổng giỏ hàng</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Tổng phụ</p>
                                    <p class="cart_amount"><?php echo number_format($total,0,",",".") ?>Đ</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Phí vận chuyển</p>
                                    <p class="cart_amount"><?php echo number_format($ship,0,",",".")?>Đ</p>
                                </div>

                                <div class="cart_subtotal">
                                    <p>Tổng</p>
                                    <p class="cart_amount"><?php echo number_format($total + $ship,0,",",".")?>Đ</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="index.php?page=checkout">Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>
<!-- shopping cart area end -->
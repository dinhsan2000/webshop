<!--product section area start-->
<section class="product_section womens_product bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm thịnh hành</h2>
                    <p>Sản phẩm ấn tượng và bán chạy nhất</p>
                    <?php
                        if (isset($_GET["id"])) {
                            $cat_id = $_GET["id"];
                            $sqlCat = "SELECT * FROM category WHERE cat_id=$cat_id";
                            $resultCat = mysqli_query($conn, $sqlCat);
                            $rowCat = mysqli_fetch_row($resultCat);
                        }
                        ?>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <?php
                    $sqlSelectPro = "SELECT * FROM products WHERE status = 1 LIMIT 4";
                    $resultProHome = mysqli_query($conn, $sqlSelectPro);
                    if (mysqli_num_rows($resultProHome) > 0) {
                        foreach ($resultProHome as $rowProHome) {
                    ?>
                            <div class="col-sm">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="index.php?page=product-details&id=<?php echo $rowProHome["pro_id"] ?>">
                                            <img src="<?php echo $rowProHome["image"] ?>" alt="<?php echo $rowProHome['pro_name'] ?>"></a>
                                        <!--    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product22.jpg" alt=""></a>-->
                                        <div class="quick_button">
                                            <a href="index.php?page=product-details&id=<?php echo $rowProHome["pro_id"] ?>" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3>
                                            <a href="index.php?page=product-details&id=<?php echo $rowProHome["pro_id"] ?>"></a>
                                        </h3>
                                        <span class="current_price"><?php echo number_format($rowProHome["price"], 0, ",", ".") ?>Đ</span>
                                        <span class="old_price"><?php echo number_format($rowProHome["old_price"], 0, ",", ".") ?>Đ</span>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
</section>
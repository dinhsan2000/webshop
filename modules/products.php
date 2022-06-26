<div class="row">
    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm của chúng tôi</h2>
                        <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
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
                    $sqlSelectPro = "SELECT pro_id, pro_name, price, image FROM products WHERE status = 1 LIMIT 4";
                    $resultProHome = mysqli_query($conn, $sqlSelectPro);
                    ;
                        foreach ($resultProHome as $rowProHome) {
                            // var_dump($rowProHome);
                            //	<?php echo $rowProHome["image"] 
                    ?>
                            <div class="col-sm">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>">
                                            <img src="<?php echo $rowProHome["image"] ?>" alt="<?php echo $rowProHome['pro_name'] ?>"></a>
                                            <a class="secondary_img" href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"><img src="<?php echo $rowProHome["image"] ?>" alt=""></a>
                                        <div class="product_action">
                                            <div class="hover_action">
                                                <a  href="#"><i class="fa fa-plus"></i></a>
                                                <div class="action_button">
                                                    <ul>

                                                        <li><a title="add to cart" href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" title="Add to Compare"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="quick_button">
                                            <a href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>" title="quick_view">Xem sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3>
                                            <a href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"><?php echo $rowProHome['pro_name'] ?></a>
                                        </h3>
                                        <span class="current_price"><?php echo number_format($rowProHome["price"], 0, ",", ".") ?>Đ</span>
                                    </div>
                                </div>
                            </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </section>
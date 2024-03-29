<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>/</li>
                        <li>shop</li>
                    </ul>
                </div>
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
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_reverse">
    <div class="container">
        <div class="shop_inner_area">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <div class="sidebar_widget">
                        <div class="widget_list widget_filter">
                            <h2>Filter by price</h2>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />

                            </form>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>Product categories</h2>
                            <ul>
                                <li><a href="#">Categories1 <span>6</span></a> </li>
                                <li><a href="#"> Categories2 <span>10</span></a> </li>
                                <li><a href="#">Categories3 <span>4</span></a> </li>
                                <li><a href="#"> Categories4 <span>4</span></a> </li>
                                <li><a href="#">Categories5 <span>3</span></a> </li>

                            </ul>
                        </div>

                        <div class="widget_list widget_categories">
                            <h2>Manufacturer</h2>
                            <?php
                            $sqlSelectFac = "SELECT * FROM factory WHERE status = 1";
                            $resultFac = mysqli_query($conn, $sqlSelectFac);
                            if (mysqli_num_rows($resultFac) > 0 ) {
                                while ($rowFac = mysqli_fetch_assoc($resultFac)) {
                            ?>
                            <ul>
                                <li><a href="index.php?page=factory&fac_id=<?php echo $rowFac['fac_id']?>"><?php echo $rowFac['fac_name']?></a> </li>
                            </ul>
                            <?php }} ?>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>Select By Color</h2>
                            <ul>
                                <li><a href="#">Black <span>6</span></a> </li>
                                <li><a href="#"> Blue <span>10</span></a> </li>
                                <li><a href="#">Brown <span>4</span></a> </li>
                                <li><a href="#"> Green <span>4</span></a> </li>
                                <li><a href="#">Pink <span>7</span></a> </li>
                                <li><a href="#">White<span>8</span></a> </li>
                                <li><a href="#">Yellow <span>5</span></a> </li>

                            </ul>
                        </div>
                        <div class="widget_list tag-cloud">
                            <h2>Popular Tags</h2>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="#">Creams</a></li>
                                    <li><a href="#">Eyebrow Pencil</a></li>
                                    <li><a href="#">Eyeliner</a></li>
                                    <li><a href="#">Eye Shadow</a></li>
                                    <li><a href="#">Lotions</a></li>
                                    <li><a href="#">Mascara</a></li>
                                    <li><a href="#">Oils</a></li>
                                    <li><a href="#">Powders</a></li>
                                    <li><a href="#">Shampoos</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_5" type="button"  class="btn-grid-5" data-toggle="tooltip" title="5"></button>

                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">

                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option  value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>


                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        <?php
                        $sqlSelectPro = "SELECT * FROM products LIMIT 6";
                        $resultProHome = mysqli_query($conn, $sqlSelectPro);
                        if (mysqli_num_rows($resultProHome) > 0) {
                            while ($rowProHome = mysqli_fetch_assoc($resultProHome)) {
                                ?>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"><img src="<?php echo $rowProHome["image"] ?>" alt="<?php echo $rowProHome['pro_name'] ?>" alt=""></a>
<!--                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>-->
                                    <div class="quick_button">
                                        <a href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"title="quick_view">Xem sản phẩm</a>
                                    </div>

                                    <div class="double_base">
                                        <div class="product_sale">
                                            <span>-7%</span>
                                        </div>
                                        <div class="label_product">
                                            <span>new</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="product_content grid_content">
                                    <h3><a href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"><?php echo $rowProHome["pro_name"] ?></a></h3>
                                    <span class="current_price"><?php echo number_format($rowProHome["price"],0,",",".") ?>Đ</span>
                                    <span class="old_price"><?php echo number_format($rowProHome["old_price"],0,",",".") ?>Đ</span>
                                </div>


                                <div class="product_content list_content">
                                    <h3><a href="<?php echo 'san-pham/'.$rowProHome["pro_id"].'/'.makeUrl($rowProHome["pro_name"]).'.html'?>"><?php echo $rowProHome["pro_name"] ?></a></h3>
                                    <div class="product_ratting">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_price">
                                        <span class="current_price"><?php echo number_format($rowProHome["price"],0,",",".")?>Đ</span>
                                        <span class="old_price"><?php echo number_format($rowProHome["old_price"],0,",",".")?>Đ</span>
                                    </div>
                                    <div class="product_desc">
                                        <p><?php echo $rowProHome['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }} ?>
                    </div>
                </div>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
<!--                                --><?php
//                                $resultPage = mysqli_query($conn, 'SELECT count(*) as total from products');
//                                $row = mysqli_fetch_assoc($resultPage);
//                                $total_records = $row['total'];
//                                // tìm limit và current page
//                                $page = 1;
//                                if(isset($_GET['category'])){
//                                    $page = $_GET['category'];
//                                }
//                                if($page <=0)
//                                {
//                                    $page =1;
//                                }
//                                $limit = 6;
//                                // tính tổng số page
//                                $total_page = ceil($total_records / $limit);
//                                if ($page > $total_page) {
//                                    $page = $total_page;
//                                } else if ($page < 1) {
//                                    $page = 1;
//                                }
//                                // tìm start page
//                                $start = ($page - 1) * $limit;
//                                // truy vấn data danh sách products
//                                $result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");
//
//                                // PHẦN HIỂN THỊ PHÂN TRANG
//                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
//
//                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
//                                if ($page > 1 && $total_page > 1){
//                                    echo '<a href="index.php?page=categor=y'.($page-1).'">Prev</a> | ';
//                                }
//
//                                // Lặp khoảng giữa
//                                for ($i = 1; $i <= $total_page; $i++){
//                                    // Nếu là trang hiện tại thì hiển thị thẻ span
//                                    // ngược lại hiển thị thẻ a
//                                    if ($i == $page){
//                                        echo '<span>'.$i.'</span> | ';
//                                    }
//                                    else{
//                                        echo '<a href="index.php?page=category='.$i.'">'.$i.'</a> | ';
//                                    }
//                                }
//
//                                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
//                                if ($page < $total_page && $total_page > 1){
//                                    echo '<a href="index.php?page=category/'.($page+1).'">Next</a> | ';
//                                    echo ($page);
//                                }
//                                ?>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--shop  area end-->

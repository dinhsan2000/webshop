<!--breadcrumbs area start-->
<div class="breadcrumbs_area product_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>/</li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <?php
                        if(isset($_GET["id"])) {
                        $id = $_GET["id"];
                        $sqlDetailPro = "SELECT * FROM products WHERE pro_id = $id";
                        $resultDetailPro = mysqli_query($conn, $sqlDetailPro);
                        // if (mysqli_num_rows($resultProHome) > 0) {
                        //  while ($rowProHome = mysqli_fetch_assoc($resultProHome)) {
                        $rowdetail = (mysqli_fetch_row($resultDetailPro));
//                        echo "<pre>";
//                        print_r($row);
                        ?>
                        <a href="#">
                            <img id="zoom1" src="<?php echo $rowdetail[5] ?>" data-zoom-image="<?php echo $rowdetail[5] ?>" alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <?php
                            $sqlImage = "SELECT * FROM images WHERE pro_id = $id";
                            $resultImg = mysqli_query($conn, $sqlImage);
                            //$rowImg = (mysqli_fetch_row($resultImg));
                            foreach ($resultImg as $rowImg) {
                            //echo "<pre>";
                           // print_r($rowImg);
                            ?>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="<?php echo "/webshop/uploads/".$rowImg["image"] ?>" data-image="<?php echo "/webshop/uploads/".$rowImg["image"] ?>" data-zoom-image="<?php echo "/webshop/uploads/".$rowImg["image"] ?>">
                                    <img src="<?php echo "/webshop/uploads/".$rowImg["image"] ?>" alt="zo-th-1"/>
                                </a>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="product_d_right">
                    <form action="#">
                        <h1><?php echo $rowdetail[1] ?></h1>
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> 1 review </a></li>
                                <li class="review"><a href="#"> Write a review </a></li>
                            </ul>
                        </div>
                        <div class="product_price">
                            <span class="current_price"><?php echo number_format($rowdetail["6"],0,",",".")?>Đ</span>
                        </div>
                        <div class="product_desc">
                            <p><?php echo $rowdetail["7"] ?></p>
                        </div>

                        <div class="product_variant color">
                            <h3>Color</h3>
                            <select class="niceselect_option" id="color" name="produc_color">
                                <option selected value="">Choose in Color</option>
                                <option selected value="<?php echo $rowdetail["11"] ?>"><?php echo $rowdetail["11"] ?></option>
                            </select>
                        </div>
                        <div class="product_variant size">
                            <?php
                            $sqlSize = "SELECT * FROM `size` WHERE status= 1 ";
                            $resultSize = mysqli_query($conn, $sqlSize);
                            $row = (mysqli_fetch_row($resultSize));
                            ?>
                            <h3>size</h3>
                            <select class="niceselect_option" id="size" name="produc_size">
                                <option selected value="1">Size</option>
                                <option value="<?php echo $row["0"] ?>"><?php echo $row["1"].'-'.$row["2"] ?></option>
                            </select>
                        </div>
                        <div class="product_variant quantity">
                            <label>Quantity</label>
                            <span class="input-group-button" onclick="minus()">
                                <button type="button" class="button hollow circle" datatype="minus" >
                                    <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            <input min="1" value="1" name="quantity" id="quantity" type="text">
                            <span class="input-group-button" onclick="plus()">
                                <button type="button" class="button hollow circle" datatype="plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                        <div class="quantity">
                            <span class="addtocart"><a href="javascript:void(0)" onclick="addCart(<?php echo $rowdetail[0]; ?>)"> Thêm vào giỏ hàng</a></span>
                        </div>
                        <div class=" product_d_action">
                            <ul>
                                <li><a href="#" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wish List</a></li>
                                <li><a href="#" title="Add to Compare"><i class="fa fa-sliders" aria-hidden="true"></i> Compare this Product</a></li>
                            </ul>
                        </div>

                    </form>
                    <div class="priduct_social">
                        <h3>Share on:</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mua hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sản phẩm đã được thêm vào giỏ hàng thành công</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bỏ qua</button>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li >
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" >
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel" >
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" >
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                            <div class="product_info_inner">
                                <div class="product_ratting mb-10">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <strong>Posthemes</strong>
                                    <p>09/07/2018</p>
                                </div>
                                <div class="product_demo">
                                    <strong>demo</strong>
                                    <p>That's OK!</p>
                                </div>
                            </div>
                            <div class="product_review_form">
                                <form action="#">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea name="comment" id="review_comment" ></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">Name</label>
                                            <input id="author"  type="text">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">Email </label>
                                            <input id="email"  type="text">
                                        </div>
                                    </div>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<?php }mysqli_close($conn)?>
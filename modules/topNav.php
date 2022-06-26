<!-- Main Wrapper Start -->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">
    <?php
    $numberpro = 0;
    if(isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key=>$value) {
            $numberpro += $value["quantity"];
        }
    } ?>
</div>
<div class="offcanvas_menu">
    <div class="canvas_open">
        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
    </div>
    <div class="offcanvas_menu_wrapper">
        <div class="canvas_close">
            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
        </div>
        <div class="welcome_text">
            <ul>
                <li><span>Giao hàng miễn phí: </span>Hãy tận dụng thời gian của chúng tôi để lưu lại sự kiện </li>
                <li><span>Trả hàng miễn phí: </span> Đảm bảo sự hài lòng</li>
            </ul>
        </div>
        <div class="top_right">
            <ul>
                <li class="top_links"><a href="#">Tài Khoản của tôi <i class="ion-chevron-down"></i></a>
                    <ul class="dropdown_links">
                        <li><a href="my-account.html">Tài khoản</a></li>
                        <li><a href="login.html"
                            <?php
                            if(isset($_SESSION["login"])) {
                                echo $_SESSION["login"][1].'</br>';
                                echo "<a href='logout.html'>Đăng xuất</a>";
                            } else {
                                echo "Đăng Nhập";
                            }
                            ?></a></li>
                        <li><a href="logout.html">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="search_bar">
            <form action="#">
                <input placeholder="Tìm kiếm..." type="text">
                <button type="submit"><i class="ion-ios-search-strong"></i></button>
            </form>
        </div>
        <div class="cart_area">
            <div class="cart_link">
                <a href="cart.html"><i class="fa fa-shopping-basket"></i> <?php echo $numberpro?> Sản Phẩm</a>
                </div>
            </div>
        </div>
        <div id="menu" class="text-left ">
            <ul class="offcanvas_main_menu">
                <li class="active">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="active">
                    <a href="category.html">Cửa hàng</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="about.html">Chúng tôi</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="contact.html">Liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="offcanvas_footer">
            <span><a href="#"><i class="fa fa-envelope-o"></i> dinhsan200@gmail.com</a></span>
            <ul>
                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!--Offcanvas menu area end-->

<!--header area start-->
<header class="header_area header_three">
    <!--header top start-->
    <div class="header_top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="welcome_text">
                        <ul>
                            <li><span>Giao hàng miễn phí:</span>Hãy tận dụng thời gian của chúng tôi để lưu lại sự kiện </li>
                            <li><span>Trả hàng miễn phí</span> Đảm bảo sự hài lòng</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="top_right text-right">
                        <ul>
                            <li class="top_links"><a href="#">Tài khoản của tôi<i class="ion-chevron-down"></i></a>
                                <ul class="dropdown_links">
                                    <li><a href="my-account.html">Tài khoản của tôi</a></li>
                                    <li><a href="login.html">
                                            <?php
                                            if(isset($_SESSION["login"])) {
                                                echo $_SESSION["login"][1].'</br>';
                                                echo "<a href='logout.html'>Đăng xuất</a>";
                                            } else {
                                                echo "Đăng Nhập";
                                            }
                                            ?>
                                        </a></li>
                                    <li><a href="logout.html"></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
        <div class="container-fluid">
            <div class="middel_inner">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="search_bar">
                            <form action="#">
                                <input placeholder="Tìm kiếm..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_area">
                            <div class="cart_link">
                                <a href="cart.html"><i class="fa fa-shopping-basket"> <?php echo $numberpro?> Sản Phẩm</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="horizontal_menu">
                <div class="left_menu">
                    <div class="main_menu">
                        <nav>
                            <ul>
                                <li><a href="index.html">Trang chủ<i class="fa"></i></a>
                                </li>
                                <li class="mega_items"><a href=".html">Cửa hàng</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="right_menu">
                    <div class="main_menu">
                        <nav>
                            <ul>
                                <li><a href="about.html">Chúng tôi</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li class="active"><a href="index.html">Trang chủ</a></li>
                                    <li><a href="category.html">Của hàng</a></li>
                                    <li><a href="about.html">Chúng tôi</a></li>
                                    <li><a href="contact.html">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</header>
<!--header area end-->
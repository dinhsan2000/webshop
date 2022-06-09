<!-- Navbar-->
<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


        <!-- User Menu-->
        <li><a class="app-nav__item" href="index.php?page=logout"><i class='bx bx-log-out bx-rotate-180'></i> </a>

        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="assets/images/admin.png" width="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name" style="color: #fff"><b>
                    <?php
                    if(isset($_SESSION["login"])) {
                        echo $_SESSION["login"][1];
                    } ?>
                </b></p>
            <p class="app-sidebar__user-designation" style="color: #fff">Chào mừng bạn trở lại</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active haha" href="index.php">
                <i class='app-menu__icon bx bx-tachometer'></i>
                <span class="app-menu__label">Bảng điều khiển</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="index.php?page=viewproduct">
                <i class='app-menu__icon bx bx-purchase-tag-alt'></i>
                <span class="app-menu__label">Quản lý sản phẩm</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="index.php?page=addproduct">
                <i class='app-menu__icon bx bx-purchase-tag-alt'></i>
                <span class="app-menu__label">Thêm sản phẩm</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="table-data-oder.html">
                <i class='app-menu__icon bx bx-task'></i>
                <span class="app-menu__label">Quản lý đơn hàng</span>
            </a>
        </li>
    </ul>
</aside>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="app-title">
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
                </ul>
                <div id="clock"></div>
            </div>
        </div>
    </div>
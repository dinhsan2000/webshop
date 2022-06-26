<?php
ob_start();
session_start();
//if(!$_SESSION["login"]) {
//    header("location:login.php");
//    echo(!$_SESSION);
//}
include ('connection.php');
include ('common.php');
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop áo local</title>
    <meta name="description" content="">
    <base href="http://localhost/webshop/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
include ('modules/topNav.php');
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    $file = "modules/".$page.".php";
    if(file_exists($file)) {
        include ($file);
    } else {
        include ('modules/404.php');
    }
} else {
    include ('modules/slider.php');
    include ('modules/banner.php');
    include ('modules/products.php');
    include ('modules/bannerft.php');
    include ('modules/productft.php');
}
include ('modules/footer.php');
?>
 <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/cart.js"></script>
</body>
</html>
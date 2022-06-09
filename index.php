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
    <title>My shop</title>
    <meta name="description" content="">
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
?>
<?php
require_once ('modules/footer.php');
?>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
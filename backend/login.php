<?php
ob_start();
session_start();
if(isset($_SESSION["login"])) {
    header("location:index.php");
}
require_once ('../connection.php');
require_once ('../common.php');
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post">
                    <?php
                    if (isset($_POST["login"])) {
                        $user_name = trim($_POST["user_name"]);
                        $password = mysqli_real_escape_string($conn, $_POST["password"]);
                        $password = md5($password);
                        $sqlLogin = "SELECT * FROM user WHERE user_name = '$user_name' and password = '$password' AND status = 1 ";
                        $result = mysqli_query($conn, $sqlLogin);
                        if (mysqli_num_rows($result)) {
                            // tạo session nếu login thành công
                            $rowlogin = mysqli_fetch_row($result);
                            $_SESSION["login"] = $rowlogin;
                            header("location:index.php");
                        } else {
                            header("location:../index.php");
                            echo ("Lỗi");
                        }
                    }
                    ?>
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="login" id="login">Submit</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="register.php"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        </div>
    </div>
</body>
</html>

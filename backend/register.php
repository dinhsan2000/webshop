<?php
ob_start();
session_start();
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
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post">
                    <?php
                    // Khởi tạo form đăng kí
                    if(isset($_POST['register'])) {
                        // Check xem có trường nào chưa có thông tin không
                        if (isset($_POST['user_name']) || !empty($_POST['email']) || !empty($_POST['password'])
                            || !empty($_POST['mobile']) || !empty($_POST['gender'])) {

                            // mysqli_escape để lọc dữ liệu tránh bị hack và lỗi sql injector
                            $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
                            $email = mysqli_real_escape_string($conn, $_POST["email"]);;
                            $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
                            $password = mysqli_real_escape_string($conn, $_POST["password"]);
                            $password = md5($password);
                            $gender = isset($_POST['gender']) ? 1 : 0;
                            $date_create = date('y-m-d H:i:s');
                            // $password = password_hash($password, PASSWORD_DEFAULT);
                            $sqlCheck = "SELECT * FROM user WHERE user_name = '$user_name' OR email = '$email'";
                            $resultCheck = mysqli_query($conn, $sqlCheck);
                            if (mysqli_num_rows($resultCheck) > 0) {
                                // Sử dụng javascript để thông báo
                                echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';

                                // Dừng chương trình
                                die ();
                            } else {
                                $sqlInsertReg = "INSERT INTO user (user_name, email, password, mobile, gender, date_create) 
                                VALUES ('$user_name', '$email', '$password', '$mobile', '$gender', '$date_create')";
                                if (mysqli_query($conn, $sqlInsertReg)) {
                                    echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
                                } else {
                                    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
                                }
                            }
                        }
                    }
                    ?>
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" required=""/>
                    </div>
                    <div>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>
                    </div>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">Nam</option>
                        <option value="">Nữ</option>
                    </select>
                    <div>
<!--                        <a class="btn btn-default submit" name="register" id="register" href="register.php">Register</a>-->
                        <button type="submit" class="btn btn-success" name="register" id="register">Submit</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link"> Login?
                            <a href="login.php"> Login </a>
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
</body>
</html>

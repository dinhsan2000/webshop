<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>/</li>
                        <li>sign</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<form method="post">
    <?php
    if (isset($_POST["login"])) {
        $user_name = trim($_POST["user_name"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password = md5($password);
        $sqlLogin = "SELECT * FROM user WHERE user_name = '$user_name' and password = '$password' AND status = 1";
        $result = mysqli_query($conn, $sqlLogin);
        if (mysqli_num_rows($result)) {
            // tạo session nếu login thành công
            $rowlogin = mysqli_fetch_row($result);
            $_SESSION["login"] = $rowlogin;
            header("Location:index.php");
        } else {
            header("Location:index.php?page=login");
        }
    }
    ?>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="#">
                            <p>
                                <label>Username or email <span>*</span></label>
                                <input type="text" name="user_name" id="user_name">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" id="password">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit" name="login" id="login">login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->
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
                            echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="index.php?page=register";</script>';

                            // Dừng chương trình
                            die ();
                        } else {
                            $sqlInsertReg = "INSERT INTO user (user_name, email, password, mobile, gender, date_create) 
                                VALUES ('$user_name', '$email', '$password', '$mobile', '$gender', '$date_create')";
                            echo ($sqlInsertReg);
                            if (mysqli_query($conn, $sqlInsertReg)) {
                                echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php?page=login";</script>';
                            } else {
                                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php?page=register";</script>';
                            }
                        }
                    }
                }
                ?>
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form method="post">
                            <p>
                                <label>User Name <span>*</span></label>
                                <input type="text" name="user_name" id="user_name">
                            </p>
                            <p>
                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="text" name="email" id="email">
                            </p>
                            <p>
                                <label>Phone <span>*</span></label>
                                <input type="text" name="mobile" id="mobile">
                            </p>
                            <p>
                                <label> Passwords <span>*</span></label>
                                <input type="password" name="password" id="password">
                            </p>
                            <p>
                                <label>Re Passwords <span>*</span></label>
                                <input type="password" name="repassword" id="repassword">
                            </p>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Nam</option>
                                <option value="">Nữ</option>
                            </select>
                            <div class="login_submit">
                                <button type="submit" name="register" id="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
</form>
<!-- customer login end -->
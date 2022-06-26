<?php
include ('connection.php');
function addNew ($table, $data) {
    global $conn;
    if(is_array($data)) {
        $field = "";
        $val = "";
        $i = 0;
        foreach ($data as $key => $value) {
            if($key != "addNew") {
                $i++;
                if ($i==1) {
                    $field .=$key;
                    $val .="'".$value."'";
                } else {
                    $field .= ",".$key;
                    $val .= ",'".$value."'";
                }
            }
        }
    }
    $sqlInsert = "INSERT INTO $table ($field)";
    $sqlInsert .= " VALUES ($val)";
    //echo ($sqlInsert);
    mysqli_query($conn, $sqlInsert) or die('Lỗi truy vấn DB');
}
function addCart ($conn)
{
    global $conn;
    if (isset($_POST["addNew"])) {
        $date = date("Y-m-d H:i:s");
        $user_id = isset($_SESSION["login"]) ? $_SESSION["login"] : 0;
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $status = 1;
        $date_create = $date;
        $payment_id = $_POST["payment"][0];
        $sqlInsertOrder = "INSERT INTO `order`(`user_id`,`fullname`, `phone_number`, `email`,`order_date`, `pay`, `address`)";
        $sqlInsertOrder .= "VALUES ('$user_id','$fullname','$phone_number','$email','$date_create','$payment_id','$address')";
        mysqli_query($conn, $sqlInsertOrder);
        $last_id = mysqli_insert_id($conn);
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $key => $value) {
                $name = $value["name"];
                $price = $value["price"];
                $quantity = $value["quantity"];
                $color = $value["color"];
                $size_name = $value["size"];
                $image = $value["image"];
                $sqlInsertOrderDetail = "INSERT INTO `order_detail`(`order_id`, `pro_id`, `price`, `color`, `size_name`, `quantity`, `status`, `date_create`, `image`, `pro_name`)";
                $sqlInsertOrderDetail .= "VALUES ('$last_id','$key','$price','$color','$size_name','$quantity','$status','$date_create', '$image', '$name')";
                mysqli_query($conn, $sqlInsertOrderDetail);
            }
        }
        session_destroy();
    }
}
function addFac ($conn) {
    global $conn;
    if(isset($_POST['addFac'])) {
        $fac_name = $_POST['fac_name'];
        $status = 1;
        $date_create = date('y-m-d H:i:s');
        $sqlInsertFac = "INSERT INTO `factory` (fac_name, status, date_create) VALUE ('$fac_name', '$status', '$date_create')";
        mysqli_query($conn, $sqlInsertFac);
    }
}
function addCat ($conn) {
    global $conn;
    if(isset($_POST['addCat'])) {
        $cat_name = $_POST['cat_name'];
        $status = 1;
        $date_create = date('y-m-d H:i:s');
        $sqlInsertFac = "INSERT INTO `category` (cat_name, status, date_create) VALUE ('$cat_name', '$status', '$date_create')";
        mysqli_query($conn, $sqlInsertFac);
    }
}
function updateCart ($conn) {
    global $conn;
    if(isset($_POST['edit'])) {
        $pro_name = $_POST['pro_name'];
        $status = false;
        $status = isset($_POST['status']) ? 1 : 0;
        $price = $_POST['price'];
        $factory = $_POST['factory_id'];
        $cat_id = $_POST['cat_id'];
        $description = $_POST['description'];
        $date_create = date('y-m-d H:i:s');
        $sqlUpdate = "UPDATE `products` SET pro_name='$pro_name', status='$status', price='$price', factory_id='$factory', date_create='$date_create', description ='$description' WHERE pro_id=" . $_GET["id"];
        $resultEdit = mysqli_query($conn, $sqlUpdate);
    }
}
function login ($conn) {
    global $conn;
    if (isset($_POST["login"])) {
        $user_name = trim($_POST["user_name"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password = md5($password);
        $sqlLogin = "SELECT * FROM user WHERE user_name = '$user_name' and password = '$password'";
        $result = mysqli_query($conn, $sqlLogin);
        if (mysqli_num_rows($result)) {
            // tạo session nếu login thành công
            $rowlogin = mysqli_fetch_row($result);
            $_SESSION["login"] = $rowlogin;
            header("Location:index.php");
        }
    }
}
function register ($conn) {
    global $conn;
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
    }
function makeUrl($string)
{
    $string = trim($string);
    $string = str_replace(' ', '-', $string);
    $string = strtolower($string);
    $string = preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ặ)/', 'a', $string);
    return $string;
}
?>


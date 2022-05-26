<?php
require_once ('../connection.php');
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<?php
if (isset($_POST['addNew'])) {
    $fac_name = $_POST['fac_name'];
    $status = isset($_POST['status']) ? 1 : 0;
    $date_create = date('y-m-d H:i:s');

        // viết câu lệnh nhập dữ liệu vào database
        $sqlInsertFac = "INSERT INTO `factory` (fac_name, status, date_create) VALUE ('$fac_name', '$status', '$date_create')";

        // Câu lệnh truy vấn dữ liệu
        mysqli_query($conn, $sqlInsertFac) or die('Lỗi truy vấn DB');
    }
?>
<div class="row">
    <form class="form-horizontal form-label-left" method="post">
        <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Nhà sản xuất</label>
            <div class="col-md-9 col-sm-9 ">
                <input type="text" class="form-control" name="fac_name" id="fac_name" placeholder="Nhập tên nhà sản xuất">
            </div>
        </div>
        <div class="col-md-9 col-sm-9 ">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="status" id="status"> Ẩn/Hiện
                </label>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success" name="addNew" id="addNew">Submit</button>
            </div>
        </div>
    </form>
</div>
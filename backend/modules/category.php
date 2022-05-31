<?php
require_once ('../connection.php');
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<div class="col-md-6">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới danh mục</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    <div class="x_content">
        <br />
        <?php
        if(isset($_POST['addNew'])) {
            $cat_name = $_POST['cat_name'];
            $status = isset($_POST['status'])?1:0;
            $date_create = date('y-m-d H:i:s');

            // Viết câu lệnh update bài viết theo id nếu không thoả mãn điều kiện id=bài viết và edit trên url
            if (isset($_GET["id"]) && isset($_GET["edit"])) {
                $sqlUpdate = "UPDATE `category` SET cat_name='$cat_name', status='$status', date_create='$date_create' WHERE cat_id=".$_GET["id"];
                // echo ($sqlUpdate);
                mysqli_query($conn, $sqlUpdate) or die("Lỗi cập nhật");
            } else {

                // hoặc thêm mới bài viết nếu không chứa url page=category&id=1&edit=1
                // viết câu lệnh nhập dữ liệu vào database
                $sqlInsert = "INSERT INTO `category` (cat_name, status, date_create) VALUE ('$cat_name', '$status', '$date_create')";

                // Câu lệnh truy vấn dữ liệu
                mysqli_query($conn, $sqlInsert) or die('Lỗi truy vấn DB');
                //echo ($sqlInsert);
            }
        }
        // Kiểm tra trong trường hợp sửa trên url
        $cat_name = '';
        $status = false;
        if (isset($_GET["id"]) && isset($_GET["edit"])) {
            $sqlEdit = "SELECT * FROM `category` WHERE cat_id=".$_GET["id"];
            $resultEdit = mysqli_query($conn, $sqlEdit);
            $rowEdit = mysqli_fetch_row($resultEdit);
            $cat_name = $rowEdit[1];
            $status = ($rowEdit[2])?true:false;
        }
        // Kiểm tra trong trường hợp xoá trên url
        if (isset($_GET["id"]) && isset($_GET["del"])) {
            $sqlDelete = "DELETE FROM `category` WHERE cat_id=".$_GET["id"];
            //echo ($sqlDelete);
            mysqli_query($conn, $sqlDelete) or die("Lỗi xoá bản ghi");
        }
        ?>
        <form class="form-label-left input_mask" method="post">
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 ">Tên danh mục</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo $cat_name ?>" placeholder="Tên danh mục">
                </div>
            </div>
            <label class="col-md-3 col-sm-3  control-label">Trạng thái sản phẩm</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" <?php echo ($status)?"checked":"" ?> name="status"  id="status"> Ẩn/Hiện
                    </label>
                </div>
            <div class="ln_solid"></div>
            <div class="form-group row">
                <div class="col-md-9 col-sm-9  offset-md-3">
                    <button type="button" class="btn btn-primary">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success" name="addNew" id="addNew">Submit</button>
                </div>
            </div>
        </form>
</div>
</div>
</div>
<div class="col-md-6">
    <div class="x_panel">
        <div class="x_title">
            <h2>Bordered table <small>Bordered table subtitle</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sqlSelect = "SELECT * FROM category";
                $result = mysqli_query($conn,$sqlSelect);
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['cat_name']?></td>
                    <td><?php echo ($row['status']) ? 'Hiển thị' : 'Ẩn'?></td>
                    <td><?php echo date("d-m-Y H:i:s", strtotime($row['date_create']))?></td>
                    <td>
                        <a href="index.php?page=category&id=<?php echo $row['cat_id']; ?>&edit=1"><i class="fa fa-pencil-square-o"></i>Sửa</a>
                    </td>
                    <td>
                        <a href="index.php?page=category&id=<?php echo $row['cat_id']; ?>&del=1" onclick="return confirm('Bạn có chắc muốn xoá bản ghi này không?');"><i class="fa fa-trash-o"></i>Xoá</a>
                    </td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

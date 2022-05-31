<?php
include ("../connection.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới sản phẩm</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
            <?php
            if(isset($_POST["addNew"])) {
                $table = "products";
                $_POST["status"] = 1;
                $_POST["date_create"] = date("Y-m-d H:i:s");

                // đường dẫn file
                $path = uploads;
                $Filename = "";
                if(isset($_FILES["image"])) {
                    if(isset($_FILES["image"]["name"])) { // xử lí file nếu tồn tại thì tiến hành upload ảnh
                        // kiểm tra định dạng  xem có phải ảnh hay không, tránh up file có virus
                        if($_FILES["image"]["type"]=="image/jpeg" || $_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/gift") {
                            // kiểm tra dung lượng file upload lên
                            if($_FILES["image"]["size"] <= 240000000) {
                                if($_FILES["image"]["error"] == 0) { // nếu lỗi = 0 thì mới upload được
                                    // di chuyển file vào thư mục upload
                                    move_uploaded_file($_FILES["image"]["tmp_name"],"../".$path."/".$_FILES["image"]["name"]);
                                    $Filename = $path."/".$_FILES["image"]["name"];
                                }else {
                                    echo "Lỗi file";
                                }
                            }else {
                                echo "File quá lớn";
                            }
                        }else {
                            echo "File không phải là ảnh";
                        }
                    }else {
                        echo "Bạn chưa chọn file";
                    }
                }
                $_POST["image"] = $Filename;
                $data = $_POST;
                die();
                addNew($table, $data);
            }
            ?>
            <div class="x_content">
                <br>
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="pro_name" name="pro_name"
                               placeholder="Tên sản phẩm">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                        $sqlSelectCat = "SELECT * FROM `category` WHERE status= 1";
                        $resultCat = mysqli_query($conn,$sqlSelectCat);
                        ?>
                        <select class="form-control" id="cat_id" name="cat_id">
                            <option value="">--- Chọn danh mục ---</option>
                            <?php
                            if (mysqli_num_rows($resultCat) > 0) {
                                while ($rowCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                            <option value="<?php echo $rowCat['cat_id'] ?>"><?php echo $rowCat['cat_name'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <select class="form-control" id="size_id" name="size_id">
                            <?php
                            $sqlSelectSize = "SELECT * FROM `size` WHERE status= 1 ";
                            $resultSize = mysqli_query($conn, $sqlSelectSize);
                            ?>
                            <option value="">--- Chọn cỡ ---</option>
                            <?php
                            if (mysqli_num_rows($resultCat) > 0) {
                                while ($rowSize = mysqli_fetch_assoc($resultSize)) {
                                    ?>
                                    <option value="<?php echo $rowSize['size_id'] ?>"><?php echo $rowSize['size_name']."--".$rowSize['size_number'] ?></option>
                                <?php } } ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <select class="form-control" id="factory_id" name="factory_id">
                            <?php
                            $sqlSelectFac = "SELECT * FROM `factory` WHERE status = 1";
                            $resultFac = mysqli_query($conn, $sqlSelectFac);
                            ?>
                            <option value="">--- Chọn thương hiệu ---</option>
                            <?php
                            if (mysqli_num_rows($resultFac) > 0) {
                                while ($rowFac = mysqli_fetch_assoc($resultFac)) {
                            ?>
                            <option value="<?php echo $rowFac['fac_id']?>"><?php echo $rowFac['fac_name']?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback" >
                        <input type="file" id="images" name="images[]" multiple="multiple">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá">
                    </div>

                    <div class="col-md-12 col-sm-12 x_content">
                        <textarea class="resizable_textarea form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" name="addNew" value="addProducts">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
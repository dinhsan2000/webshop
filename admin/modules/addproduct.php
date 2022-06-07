 <?php
 $conn = mysqli_connect('localhost', 'root', '', 'webshop');
 ?>
 <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                                        class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                                        class="fas fa-folder-plus"></i> Thêm danh mục</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                                        class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                        </div>
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

                if(isset($_FILES['images'])) {
                    $files = $_FILES['images'];
                    $file_names = $files['name'];
                   // var_dump($files['tmp_name']);

                    foreach ($file_names as $key => $value) {
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], '../uploads/'.$value);
                    }
                }
                $_POST["image"] = $Filename;
                //var_dump($Filename);
                $data = $_POST;
                addNew($table, $data);
                $pro_id = mysqli_insert_id($conn);
                foreach ($file_names as $key => $values) {
                    mysqli_query($conn, "INSERT INTO images SET pro_id = '$pro_id', image = '$values' ");
                }
            }
            ?>
                    <form class="row" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" name="pro_name" id="pro_name" type="text">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
                            <?php
                            $sqlSelectFac = "SELECT * FROM `factory` WHERE status= 1";
                            $resultFac = mysqli_query($conn,$sqlSelectFac);
                            ?>
                            <select class="form-control" id="factory_id" name="factory_id">
                                <option value="">-- Chọn nhà cung cấp --</option>
                                <?php
                                if (mysqli_num_rows($resultFac) > 0) {
                                while ($rowFac = mysqli_fetch_assoc($resultFac)) {
                                ?>
                                <option value="<?php echo $rowFac['fac_id'] ?>"><?php echo $rowFac['fac_name'] ?></option>
                                <?php } }?>
                            </select>
                        </div>

                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <?php
                            $sqlSelectCat = "SELECT * FROM `category` WHERE status = 1";
                            $resultCat = mysqli_query($conn, $sqlSelectCat);
                            ?>
                            <select class="form-control" name="cat_id" id="cat_id">
                                <option value="">-- Chọn danh mục --</option>
                                <?php
                                if (mysqli_num_rows($resultCat) > 0 ) {
                                    while ($rowCat = mysqli_fetch_assoc($resultCat)) {
                                ?>
                                <option value="<?php echo $rowCat['cat_id'] ?>"><?php echo $rowCat['cat_name'] ?></option>
                                <?php }} ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Kích cỡ sản phẩm</label>
                            <?php
                            $sqlSelectSize = "SELECT * FROM `size` WHERE status= 1";
                            $resultSize = mysqli_query($conn,$sqlSelectSize);
                            ?>
                            <select class="form-control" id="size_id" name="size_id">
                                <option value="">-- Chọn kích cỡ --</option>
                                <?php
                                if (mysqli_num_rows($resultSize) > 0) {
                                while ($rowSize = mysqli_fetch_assoc($resultSize)) {
                                ?>
                                <option value="<?php echo $rowSize['size_id'] ?>"><?php echo $rowSize['size_name']."--".$rowSize['size_number'] ?></option>
                                <?php } }?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" name="price" id="price" type="text">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Màu sắc</label>
                            <input type="text" name="color_pro" class="form-control" id="color_pro">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh thumb sản phẩm</label>
                            <div class="form-group">
                             <input type="file" class="form-control-file" name="image" id="image">
                             </div>
                            </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh mô tả sản phẩm</label>
                            <div class="form-group">
                                <input type="file" class="form-control-file" multiple name="images[]" id="images">
                            </div>
                        </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                </div>
                <button class="btn btn-save" type="submit" name="addNew" id="addNew">Lưu lại</button>
                <a class="btn btn-cancel" href="table-data-product.html">Hủy bỏ</a>
            </div>
     </form>
</main>


<!--
MODAL CHỨC VỤ
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới nhà cung cấp</h5>
              </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Nhập tên chức vụ mới</label>
                        <input class="form-control" type="text" required>
                    </div>
                </div>
                <BR>
                <button class="btn btn-save" type="button">Lưu lại</button>
                <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--
MODAL
-->



<!--
MODAL DANH MỤC
-->
<div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục </h5>
              </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Nhập tên danh mục mới</label>
                        <input class="form-control" type="text" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Danh mục sản phẩm hiện đang có</label>
                        <ul style="padding-left: 20px;">
                            <li>Bàn ăn</li>
                            <li>Bàn thông minh</li>
                            <li>Tủ</li>
                            <li>Ghế gỗ</li>
                            <li>Ghế sắt</li>
                            <li>Giường người lớn</li>
                            <li>Giường trẻ em</li>
                            <li>Bàn trang điểm</li>
                            <li>Giá đỡ</li>
                        </ul>
                    </div>
                </div>
                <BR>
                <button class="btn btn-save" type="button">Lưu lại</button>
                <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--
MODAL
-->




<!--
MODAL TÌNH TRẠNG
-->
<div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới tình trạng</h5>
              </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Nhập tình trạng mới</label>
                        <input class="form-control" type="text" required>
                    </div>
                </div>
                <BR>
                <button class="btn btn-save" type="button">Lưu lại</button>
                <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
        </div>
<!--
MODAL
-->
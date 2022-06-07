<form class="row" method="post" enctype="multipart/form-data">
    <?php
    $id=$_GET['id'];
    $sqlSelect = "SELECT * FROM category AS c, products AS p, factory AS f, size AS s WHERE c.cat_id = p.cat_id AND f.fac_id = p.cat_id AND s.size_id = p.size_id AND pro_id = '$id'";
    $result = mysqli_query($conn,$sqlSelect);
    foreach ($result as $row) {
        ?>
    <div class="form-group col-md-3">
        <label class="control-label">Mã sản phẩm</label>
        <input class="form-control" value="<?php echo $row['pro_id']?>" name="pro_id" id="pro_id" type="text">
    </div>
    <?php } ?>
    <div class="form-group col-md-3">
        <label class="control-label">Tên sản phẩm</label>
        <input class="form-control" name="pro_name" value="<?php echo $row['pro_name']?>" id="pro_name" type="text">
    </div>
    <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
        <select class="form-control" id="factory_id" name="factory_id">
            <option value="">-- Chọn nhà cung cấp --</option>
            <option value="<?php echo $row['fac_id']?>"><?php echo $row['fac_name']?></option>
        </select>
    </div>

    <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Danh mục</label>
        <select class="form-control" name="cat_id" id="cat_id">
            <option value="">-- Chọn danh mục --</option>
            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
        </select>
    </div>

    <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Kích cỡ sản phẩm</label>
        <select class="form-control" id="size_id" name="size_id">
            <option value="">-- Chọn kích cỡ --</option>
            <option value="<?php echo $row['size_id']?>"><?php echo $row['size_name']?></option>
        </select>
    </div>

    <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Trạng thái sản phẩm</label>
        <lable>
            Ẩn/Hiện
            <input type="checkbox" value="1" name="status" id="status">
        </lable>
    </div>

    <div class="form-group col-md-3">
        <label class="control-label">Giá bán</label>
        <input class="form-control" value="<?php echo $row['price']?>" name="price" id="price" type="text">
    </div>

    <div class="form-group col-md-12">
        <label class="control-label">Ảnh sản phẩm</label>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
    </div>

    </div>
    <div class="form-group col-md-12">
        <label class="control-label">Mô tả sản phẩm</label>
        <textarea class="form-control" name="description" id="description"><?php echo $row['description']?></textarea>
    </div>

    </div>
    <button class="btn btn-save" type="submit" name="edit" id="edit">Lưu lại</button>
    <a class="btn btn-cancel" href="table-data-product.html">Hủy bỏ</a>
    </div>
    <?php
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
        echo "<pre>";
        print_r($sqlUpdate);
        $resultEdit = mysqli_query($conn, $sqlUpdate);
    }
    ?>
</form>
</main>
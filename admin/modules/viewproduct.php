<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="index.php?page=addproduct" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                    class="fas fa-file-upload"></i> Tải từ file</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                    class="fas fa-print"></i> In dữ liệu</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                    class="fas fa-copy"></i> Sao chép</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                    class="fas fa-file-pdf"></i> Xuất PDF</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <?php
                            $sqlSelectPro = "SELECT * FROM category AS c, products AS p, factory AS f WHERE c.cat_id = p.cat_id AND f.fac_id = p.cat_id";
                            $resultPro = mysqli_query($conn, $sqlSelectPro);
                        ?>
                        <thead>
                            <?php
                            foreach($resultPro as $rowPro) {
                            ?>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá bán</th>
                            <th>Danh mục</th>
                            <th>Nhà sản xuất</th>
                            <th>Mô tả sản phẩm</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td><?php echo $rowPro['pro_id'] ?></td>
                            <td><?php echo $rowPro['pro_name'] ?></td>
                            <td><img src="<?php echo "/webshop/".$rowPro['image'] ?>" alt="" width="100px;"></td>
                            <td><?php echo number_format($rowPro['price'],0,",","." ) ?>Đ</td>
                            <td><?php echo $rowPro['cat_name'] ?></td>
                            <td><?php echo $rowPro['fac_name'] ?></td>
                            <td><?php echo $rowPro['description'] ?></td>

                            <!-- @todo thêm tính năng sửa xoá -->
                            <td><button class="btn btn-primary btn-sm trash" name="del" id="del" type="button" title="Xóa"
                                        onclick="myFunction(this)">
                                    <a href="index.php?page=delproduct&id=<?php echo $rowPro['pro_id'] ?>" onclick="return confirm('Bạn có chắc muốn xoá bản ghi này không?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" name="edit">
                                    <a href="index.php?page=editproduct&id=<?php echo $rowPro['pro_id'] ?>">
                                    <i class="fas fa-edit"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
if (isset($_GET["id"])) {
    $order_id = $_GET["id"];
    $sqlCat = "SELECT * FROM order_detail WHERE order_id = $order_id";
    $resultCat = mysqli_query($conn, $sqlCat);
    $rowCat = mysqli_fetch_row($resultCat);
}
?>
 <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="#" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới đơn hàng</a>
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
                        $sqlOrder = "SELECT * FROM `order`";
                        $result = mysqli_query($conn, $sqlOrder);
                        $data = [];
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'order_id' => $row['order_id'],
                                'fullname' => $row['fullname'],
                                'phone_number' => $row['phone_number'],
                                'pay' => $row['pay'],
                                'address' => $row['address'],
                                'order_date' => $row['order_date']
                            );
                        }
                        ?>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày mua</th>
                            <th>Thanh toán</th>
                        </tr>
                        <tbody>
                        <?php foreach ($data as $roworder) { ?>
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td><?php echo $roworder['order_id']?></td>
                            <td><?php echo $roworder['fullname']?></td>
                            <td><?php echo $roworder['phone_number']?></td>
                            <td><?php echo $roworder['address']?></td>
                            <td><?php echo $roworder['order_date']?></td>
                            <td><span class="badge bg-success"><?php echo $roworder['pay'] == '1' ? "COD" : "BANK"?></span></td>
                            <td>
                                <a style=" color: rgb(245 157 57);background-color: rgb(251 226 197); padding: 5px;border-radius: 5px;" href="index.php?page=vieworder&id=<?php echo $roworder['order_id'] ?>">
                                    <i class="fa"></i>Chi tiết đơn hàng</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
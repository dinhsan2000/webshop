<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <?php
                    if (isset($_GET["id"])) {
                        $order_id = $_GET["id"];
                        $sqlviewOrder = "SELECT * FROM order_detail WHERE order_id = $order_id";
                        $result = mysqli_query($conn, $sqlviewOrder);
                    }
                    ?>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Size</th>
                        <th>Màu</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thời gian</th>

                    </tr>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($result as $row) {
                        ?>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td><?php echo $row['pro_id'] ?></td>
                        <td><?php echo $row['pro_name'] ?></td>
                        <td>
                            <img style="width: 100px" src="<?php echo "/webshop/".$row['image']?>" alt="">
                        </td>
                        <td><?php echo $row['size_name'] ?></td>
                        <td><?php echo $row['color'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo number_format($row['price'],'0',',','.') ?>Đ</td>
                        <td><?php echo $row['date_create'] ?></td>
                        </tr>
                    <tr>
                        <td><input type="checkbox" name="check1" value="1"></td>
                        <td style="color:blue" colspan="6">Tổng tiền: <?php echo number_format($row['price'] * $row['quantity'],'0',',','.')?>Đ</td>
                    </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</main>
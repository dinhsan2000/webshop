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
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Màu</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($result as $row) {
                        ?>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td><?php echo $row['pro_id'] ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>